<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\UserRequest as StoreRequest;
use App\Http\Requests\UserRequest as UpdateRequest;

class ListUsersController extends CrudController
{
    public function setup() {
        $this->crud->setModel('App\ListUser');
        $this->crud->removeButton('create');
        $this->crud->setRoute(config('backpack.base.route_prefix')  . '/users');
        $this->crud->setEntityNameStrings('ListUser', 'ListUsers');
        $this->crud->setColumns(['email','user_type_id']);
        $this->crud->addField([
        'name' => 'email',
        'label' => 'email'
        ]);
        $this->crud->addField([
            'name' => 'user_type_id',
            'label' => 'user type',
            'type'  => 'radio',
            'options'     => [
                1 => "admin",
                2 => "user"
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
