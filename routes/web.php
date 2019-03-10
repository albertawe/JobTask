<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if (Auth::check()){
    Route::get('/home', "root\UserProfileController@index");
    Route::get('/', "root\UserProfileController@index");
}
else {
    Route::get('/home', function () {
        return view('welcome');
    });
    Route::get('/', function () {
        return view('welcome');
    });
}

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();
Route::resource('dashboard','\App\Http\Controllers\root\UserProfileController')->middleware('auth');
Route::resource('posttask','\App\Http\Controllers\root\JobPostController')->middleware('auth');
Route::post('/uploadpic/{id}','\App\Http\Controllers\root\edittaskcontroller@uploadpic')->middleware('auth');
Route::get('/posttasks/{id}','\App\Http\Controllers\root\edittaskcontroller@showtask')->middleware('auth');
Route::patch('/posttasks/{id}','\App\Http\Controllers\root\edittaskcontroller@updatetask')->middleware('auth');
Route::resource('browsetask','\App\Http\Controllers\root\BrowseTaskController')->middleware('auth');
Route::resource('mytask','\App\Http\Controllers\root\MyTaskController')->middleware('auth');
Route::resource('viewtask','\App\Http\Controllers\root\ViewJobController')->middleware('auth');
Route::resource('postoffer','\App\Http\Controllers\root\OfferController')->middleware('auth');
Route::resource('postskill','\App\Http\Controllers\root\UserSkillController')->middleware('auth');
Route::resource('viewtask/viewprofile','\App\Http\Controllers\root\ViewProfileController')->middleware('auth');
Route::get('/viewtask/accept_offer/{offer_id}', "root\AcceptOfferController@Accept")->middleware('auth');
Route::get('/viewtask/finish_offer/{id}', "root\AcceptOfferController@finish")->middleware('auth');
Route::get('/viewtask/createmessage/{id}',"root\messagecontroller@create")->middleware('auth');
Route::get('/message',"root\messagecontroller@index")->middleware('auth');
Route::get('/viewcons/{id}',"root\conversationcontroller@index")->middleware('auth');
Route::post('/viewcons/send_message/{id}', "root\conversationcontroller@post_message")->middleware('auth');
Route::post('/changepass', "root\changepasscontroller@changepass")->middleware('auth');
Route::get('/email', function () {
    return view('send_email');
})->middleware('auth');
Route::post('/sendEmail', 'Email@sendEmail');
Route::post('/payment/{id}','Email@sendInvoice');
