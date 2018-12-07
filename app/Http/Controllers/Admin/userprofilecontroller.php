<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagCrudRequest as StoreRequest;
use App\Http\Requests\TagCrudRequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class userprofilecontroller extends CrudController
{
    public function setup() {
        $this->crud->setModel('App\UserProfile');
        $this->crud->removeButton('create');
        $this->crud->removeButton('update');
        $this->crud->setRoute(config('backpack.base.route_prefix')  . '/userprofile');
        $this->crud->setEntityNameStrings('UserProfile', 'UserProfiles');
        $this->crud->setColumns(['first_name','last_name','email','bank','no_rek','birthdate','location','tagline']);
        // $this->crud->addField([
        // 'name' => 'first_name',
        // 'label' => 'first name'
        // ]);
        // $this->crud->addField([
        //     'name' => 'last_name',
        //     'label' => 'last name'
        // ]);
        // $this->crud->addField([
        //     'name' => 'email',
        //     'label' => 'email'
        //     ]);
        // $this->crud->addField([
        //         'name' => 'bank',
        //         'label' => 'bank'
        //         ]);
        // $this->crud->addField([
        //             'name' => 'no_rek',
        //             'label' => 'no rekening'
        //             ]);
        // $this->crud->addField([
        //                 'name' => 'birthdate',
        //                 'label' => 'birthdate'
        //                 ]);
        // $this->crud->addField([
        //                     'name' => 'location',
        //                     'label' => 'lokasi'
        //                     ]);
        // $this->crud->addField([
        //                         'name' => 'tagline',
        //                         'label' => 'tagline'
        //                         ]);
    }

	// public function store(StoreRequest $request)
	// {
	// 	return parent::storeCrud();
	// }

	// public function update(UpdateRequest $request)
	// {
	// 	return parent::updateCrud();
	// }
}
