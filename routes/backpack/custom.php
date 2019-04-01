<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.
Route::get('/admin/creditlog/search/{id}/sendemail', 'App\Http\Controllers\Admin\jobpaymentdetailcontroller@sendemail');
Route::get('/admin/jobpaymentdetail/search/{id}/receiveless', 'App\Http\Controllers\Admin\jobpaymentdetailcontroller@receiveless');
Route::get('/admin/jobpaymentdetail/search/{id}/receivemore', 'App\Http\Controllers\Admin\jobpaymentdetailcontroller@receivemore');
Route::get('/admin/reportmessage/search/{id}/openchat', 'App\Http\Controllers\Admin\reportmessagecontroller@openchat');
Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('jobcategory', 'jobcategorycontroller');
    CRUD::resource('reporttask', 'reporttaskcontroller');
    CRUD::resource('creditlog', 'creditlogcontroller');
    CRUD::resource('reportmessage', 'reportmessagecontroller');
    CRUD::resource('reportmessagecons', 'reportmessageconscontroller');
    CRUD::resource('message', 'messagecontroller');
    CRUD::resource('messagecons', 'messageconscontroller');
    CRUD::resource('jobpaymentdetail', 'jobpaymentdetailcontroller');
    CRUD::resource('jobpost', 'jobpostcontroller');
    CRUD::resource('blog', 'blogcontroller');
    CRUD::resource('users', 'ListUsersController');
    CRUD::resource('userprofile', 'userprofilecontroller');
    CRUD::resource('userskill', 'userskillcontroller');
}); // this should be the absolute last line of this file
