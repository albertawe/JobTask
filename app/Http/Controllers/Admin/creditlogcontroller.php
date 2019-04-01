<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagCrudRequest as StoreRequest;
use App\Http\Requests\TagCrudRequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class creditlogcontroller extends CrudController
{
    public function sendemail($id) 
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $paymentdetail = PaymentDetail::where('id',$id)->first();
        $paymentdetail->paid_status = 'paid';
        $invid = $paymentdetail->payment_id;
        $credit = creditlog::where('payment_id',$invid)->first();
        $uid = $credit->user_id;
        $user = User::where('id', $uid)->with(['user_profile','credit'])->first();
        $email = $user->email;
        $req = $credit->status;
        if($req == 'topup'){
        $user->credit->credit = $user->credit->credit + $credit->nominal;
        }
        elseif($req == 'withdraw'){
            $user->credit->credit = $user->credit->credit - $credit->nominal;
        }
        if (creditlog::where([
            ['payment_id','=',$invid],
            ['status','=','topup revision']
        ])->exists()) {
            $credits = creditlog::where([
                ['payment_id','=',$invid],
                ['status','=','topup revision']
            ])->first();
            $credits->status = 'topup revision completed';
            $credits->save();
        }
        $credit->completed_at = $now;
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        $credit->status = $req." "."completed";
        $credit->save();
        $user->credit->save();
        $paymentdetail->save();
        try{
            Mail::send('emailuserpaid',['reqq' => $req, 'first_name' => $firstname, 'last_name' => $lastname ,'invoice' => $invid], function ($message) use ($email)
            {
                $message->subject('request anda telah selesai');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
            return back();
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }

    public function setup() {
        $this->crud->setModel('App\creditlog');
        $this->crud->setRoute(config('backpack.base.route_prefix')  . '/creditlog');
        $this->crud->setEntityNameStrings('creditlog', 'creditlogs');
        $this->crud->addButtonFromView('line', 'sendemail', 'sendemail', 'beginning');
        $this->crud->addButtonFromView('line', 'receiveless', 'receiveless', 'beginning');
        $this->crud->addButtonFromView('line', 'receivemore', 'receivemore', 'beginning');
        $this->crud->addButtonFromView('line', 'showimage', 'showimage', 'beginning');
        $this->crud->setColumns(['user_id','payment_id','status','BankName','OwnerName','RekNo','image','nominal','reason','created_at','confirmation_at','completed_at']);
        $this->crud->addField([
            'name' => 'payment_id',
            'label' => 'payment id'
            ]);
        $this->crud->addField([ // image
            'label' => "Payment Evidence",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            // 'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
            'disk' => 'uploads', // in case you need to show images from a different disk
            //'prefix' => '/images' // in case you only store the filename in the database, this text will be prepended to the database value
            ]);
    }
    public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}
}
