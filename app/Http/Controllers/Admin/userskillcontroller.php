<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\blogrequest as StoreRequest;
use App\Http\Requests\blogrequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class userskillcontroller extends CrudController
{
    public function setup() {
        $this->crud->setModel('App\UserSkill');
        $this->crud->setRoute(config('backpack.base.route_prefix')  . '/userskill');
        $this->crud->setEntityNameStrings('userskill', 'userskills');
        $this->crud->setColumns(['user_id','transportation','language','qualification','workexperience','images','cv','tagline']);
        $this->crud->addField([
        'name' => 'transportation',
        'label' => 'transportation'
        ]);
        $this->crud->addField([
        'name' => 'language',
        'label' => 'language'
        ]);
        $this->crud->addField([
        'name' => 'qualification',
        'label' => 'qualification'
        ]);
        $this->crud->addField([
        'name' => 'workexperience',
        'label' => 'workexperience'
        ]);
        $this->crud->addField([
        'name' => 'images',
        'label' => 'images'
        ]);
        $this->crud->addField([
        'name' => 'cv',
        'label' => 'cv'
        ]);
        $this->crud->addField([
        'name' => 'tagline',
        'label' => 'tagline'
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
