<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Controllers\Controller;
use App\Http\Requests\jobcategoryrequest as StoreRequest;
use App\Http\Requests\jobcategoryrequest as UpdateRequest;

class jobcategorycontroller extends CrudController
{
    public function setup() {
        $this->crud->setModel('App\jobcategory');
        $this->crud->setRoute(config('backpack.base.route_prefix')  . '/jobcategory');
        $this->crud->setEntityNameStrings('jobcategory', 'jobcategories');
        $this->crud->setColumns(['category']);
        $this->crud->addField([
        'name' => 'category',
        'label' => 'category of task'
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
