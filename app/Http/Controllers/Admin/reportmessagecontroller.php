<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\TagCrudRequest as StoreRequest;
use App\Http\Requests\TagCrudRequest as UpdateRequest;
use App\reportmessage;
use App\User;
use Mail;
use Auth;

class reportmessagecontroller extends CrudController
{

    public function setup() {
        $this->crud->setModel('App\reportmessage');
        $this->crud->setRoute(config('backpack.base.route_prefix')  . '/reportmessage');
        $this->crud->setEntityNameStrings('report message', 'report messages');
        $this->crud->setColumns(['ticket','title','user_id','status']);
        $this->crud->addButtonFromView('line', 'openchat', 'openchat', 'beginning');
        $this->crud->addField([
        'name' => 'ticket',
        'label' => 'ticket'
        ]);
        $this->crud->addField([
            'name' => 'user_id',
            'label' => 'user_id'
        ]);
        $this->crud->addField([
        'name' => 'status',
        'label' => 'chat status',
        'type'  => 'radio',
        'options'     => [ // the key will be stored in the db, the value will be shown as label; 
            "active" => "active",
            "not active" => "not active",
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
