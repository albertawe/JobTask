<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\blogrequest as StoreRequest;
use App\Http\Requests\blogrequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class messageconscontroller extends CrudController
{
    public function setup() {
        $this->crud->setModel('App\conversation');
        $this->crud->setRoute(config('backpack.base.route_prefix')  . '/messagecons');
        $this->crud->setEntityNameStrings('conversation', 'conversations');
        $this->crud->setColumns(['cons_id','content','sender_id','created_at']);
        $this->crud->addField([
        'name' => 'cons_id',
        'label' => 'cons id'
        ]);
        $this->crud->addField([
        'name' => 'content',
        'label' => 'content'
        ]);
        $this->crud->addField([
        'name' => 'sender_id',
        'label' => 'sender id'
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
