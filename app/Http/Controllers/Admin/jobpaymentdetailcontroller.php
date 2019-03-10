<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\TagCrudRequest as StoreRequest;
use App\Http\Requests\TagCrudRequest as UpdateRequest;
use App\PaymentDetail;
use App\user;
use App\JobPost;
use Mail;

class jobpaymentdetailcontroller extends CrudController
{
    public function sendemail($id) 
    {
        $paymentdetail = PaymentDetail::where('id',$id)->first();
        $paymentdetail->paid_status = 'paid';
        $invid = $paymentdetail->invoice;
        $job = JobPost::where('payment_id',$paymentdetail->payment_id)->first();
        $jobname = $job->title;
        $user = User::where('id', $job->posted_by_id)->with(['user_profile'])->first();
        $email = $user->email;
        $job->status = 'not assigned';
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        $job->save();
        $paymentdetail->save();
        try{
            Mail::send('emailuserpaid',['job_name' => $jobname, 'first_name' => $firstname, 'last_name' => $lastname ,'invoice' => $invid], function ($message) use ($email)
            {
                $message->subject('pembayaran anda telah kami terima');
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
            "not paid" => "not paid"
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
