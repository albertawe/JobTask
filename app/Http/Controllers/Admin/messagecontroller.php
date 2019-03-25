<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\blogrequest as StoreRequest;
use App\Http\Requests\blogrequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class messagecontroller extends CrudController
{
    public function setup() {
        $this->crud->setModel('App\message');
        $this->crud->setRoute(config('backpack.base.route_prefix')  . '/message');
        $this->crud->setEntityNameStrings('message', 'messages');
        $this->crud->setColumns(['user1','user2','name1','name2','status','job_id']);
        $this->crud->addField([
        'name' => 'user1',
        'label' => 'user1'
        ]);
        $this->crud->addField([
        'name' => 'user2',
        'label' => 'user2'
        ]);
        $this->crud->addField([
        'name' => 'name1',
        'label' => 'name1'
        ]);
        $this->crud->addField([
        'name' => 'name2',
        'label' => 'user2'
        ]);
        $this->crud->addField([
            'name' => 'job_id',
            'label' => 'job id'
        ]);
        $this->crud->addField([
            'name' => 'status',
            'label' => 'status',
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
