<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.
Route::get('/admin/jobpaymentdetail/search/{id}/sendemail', 'App\Http\Controllers\Admin\jobpaymentdetailcontroller@sendemail');
Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('jobcategory', 'jobcategorycontroller');
    CRUD::resource('jobpaymentdetail', 'jobpaymentdetailcontroller');
    CRUD::resource('jobpost', 'jobpostcontroller');
    CRUD::resource('blog', 'blogcontroller');
    CRUD::resource('users', 'ListUsersController');
    CRUD::resource('userprofile', 'userprofilecontroller');
}); // this should be the absolute last line of this file
