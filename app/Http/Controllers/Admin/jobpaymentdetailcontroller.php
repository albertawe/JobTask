<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\TagCrudRequest as StoreRequest;
use App\Http\Requests\TagCrudRequest as UpdateRequest;

class jobpaymentdetailcontroller extends CrudController
{
    public function setup() {
        $this->crud->setModel('App\PaymentDetail');
        $this->crud->setRoute(config('backpack.base.route_prefix')  . '/jobpaymentdetail');
        $this->crud->setEntityNameStrings('payment detail', 'payment details');
        $this->crud->setColumns(['payment_id','paid_status']);
        $this->crud->addField([
        'name' => 'payment_id',
        'label' => 'payment id'
        ]);
        $this->crud->addField([
        'name' => 'paid_status',
        'label' => 'paid status',
        'type'  => 'radio',
        'options'     => [ // the key will be stored in the db, the value will be shown as label; 
            "paid" => "paid",
            "not paid" => "unpaid"
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
