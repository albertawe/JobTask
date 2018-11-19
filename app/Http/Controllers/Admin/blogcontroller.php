<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\blogrequest as StoreRequest;
use App\Http\Requests\blogrequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class blogcontroller extends CrudController
{
    public function setup() {
        $this->crud->setModel('App\blog');
        $this->crud->setRoute(config('backpack.base.route_prefix')  . '/blog');
        $this->crud->setEntityNameStrings('blog', 'blogs');
        $this->crud->setColumns(['berita']);
        $this->crud->addField([
        'name' => 'berita',
        'label' => 'announcement'
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
