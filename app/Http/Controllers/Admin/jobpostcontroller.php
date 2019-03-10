<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\TagCrudRequest as StoreRequest;
use App\Http\Requests\TagCrudRequest as UpdateRequest;
class jobpostcontroller extends  CrudController
{
    public function setup() {
        $this->crud->setModel('App\JobPost');
        $this->crud->setRoute(config('backpack.base.route_prefix')  . '/jobpost');
        $this->crud->setEntityNameStrings('job', 'jobs');
        $this->crud->setColumns(['payment_id','title','job_type','job_category','status','due_date','price','address','job_description']);
        $this->crud->addField([
        'name' => 'payment_id',
        'label' => 'payment id'
        ]);
        $this->crud->addField([
            'name' => 'posted_by_id',
            'label' => 'poster id'
            ]);
            $this->crud->addField([
                'name' => 'title',
                'label' => 'job title'
                ]);
                $this->crud->addField([
                    'name' => 'job_type',
                    'label' => 'type of job'
                    ]);
                    $this->crud->addField([
                        'name' => 'job_category',
                        'label' => 'job category'
                        ]);
                        $this->crud->addField([
                            'name' => 'assigned_tasker_id',
                            'label' => 'assigned id of tasker'
                            ]);
                            $this->crud->addField([
                                'name' => 'due_date',
                                'label' => 'due date',
                                'type' => 'date_picker',
                                'date_picker_options' => [
                                    'todayBtn' => true,
                                    'format' => 'dd-mm-yyyy'
                                 ],
                                ]);
                                $this->crud->addField([
                                    'name' => 'price',
                                    'label' => 'price',
                                    'type' => 'number',
                                    'attributes' => ["step" => "any"],
                                     'prefix' => "Idr",
                                     'suffix' => ".00",
                                    ]);
                                    $this->crud->addField([
                                        'name' => 'address',
                                        'label' => 'task address'
                                        ]);
                                        $this->crud->addField([
                                            'name' => 'job_description',
                                            'label' => 'job description'
                                            ]);
        $this->crud->addField([
        'name' => 'status',
        'label' => 'status of job',
        'type'  => 'radio',
        'options'     => [ // the key will be stored in the db, the value will be shown as label; 
            "not paid" => "not paid",
            "not assigned" => "not assigned",
            "assigned" => "assigned",
            "finished" => "finished",
            "completed" => "completed"
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
