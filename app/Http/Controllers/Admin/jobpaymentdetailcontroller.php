<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\TagCrudRequest as StoreRequest;
use App\Http\Requests\TagCrudRequest as UpdateRequest;
use App\PaymentDetail;
use App\user;
use App\creditlog;
use Mail;

class jobpaymentdetailcontroller extends CrudController
{
    public function sendemail($id) 
    {
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
        $this->crud->setModel('App\PaymentDetail');
        $this->crud->setRoute(config('backpack.base.route_prefix')  . '/jobpaymentdetail');
        $this->crud->setEntityNameStrings('payment detail', 'payment details');
        $this->crud->setColumns(['payment_id','invoice','paid_status']);
        $this->crud->addButtonFromView('line', 'sendemail', 'sendemail', 'beginning');
        $this->crud->addField([
        'name' => 'payment_id',
        'label' => 'payment id'
        ]);
        $this->crud->addField([
            'name' => 'invoice',
            'label' => 'invoice'
        ]);
        $this->crud->addField([
        'name' => 'paid_status',
        'label' => 'paid status',
        'type'  => 'radio',
        'options'     => [ // the key will be stored in the db, the value will be shown as label; 
            "paid" => "paid",
            "paid pending" => "paid pending",
        ],
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
