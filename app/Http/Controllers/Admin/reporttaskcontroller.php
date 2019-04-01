<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagCrudRequest as StoreRequest;
use App\Http\Requests\TagCrudRequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class reporttaskcontroller extends CrudController
{
    public function setup() {
        $this->crud->setModel('App\reporttask');
        $this->crud->setRoute(config('backpack.base.route_prefix')  . '/reporttask');
        $this->crud->setEntityNameStrings('reporttask', 'reporttasks');
        $this->crud->removeButton('create');
        $this->crud->removeButton('update');
        $this->crud->addButtonFromView('line', 'continueatoffice', 'continueatoffice', 'beginning');
        $this->crud->addButtonFromView('line', 'posterright', 'posterright', 'beginning');
        $this->crud->addButtonFromView('line', 'workerright', 'workerright', 'beginning');
        $this->crud->addButtonFromView('line', 'evidence', 'evidence', 'beginning');
        $this->crud->setColumns(['poster_status','worker_status','report_status','poster_email','worker_email','job_id','poster_id','worker_id']);
    }
}

