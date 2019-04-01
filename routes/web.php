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
Route::get('/term','root\viewjobcontroller@term');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();
Route::resource('dashboard','\App\Http\Controllers\root\UserProfileController')->middleware('auth');
Route::resource('posttask','\App\Http\Controllers\root\JobPostController')->middleware('auth');
Route::post('/uploadpic/{id}','\App\Http\Controllers\root\edittaskcontroller@uploadpic')->middleware('auth');
Route::get('/posttasks/{id}','\App\Http\Controllers\root\edittaskcontroller@showtask')->middleware('auth');
Route::get('/canceltasks/{id}','\App\Http\Controllers\root\edittaskcontroller@canceltask')->middleware('auth');
Route::patch('/posttasks/{id}','\App\Http\Controllers\root\edittaskcontroller@updatetask')->middleware('auth');
Route::resource('browsetask','\App\Http\Controllers\root\BrowseTaskController')->middleware('auth');
Route::resource('mytask','\App\Http\Controllers\root\MyTaskController')->middleware('auth');
Route::resource('viewtask','\App\Http\Controllers\root\ViewJobController')->middleware('auth');
Route::resource('postoffer','\App\Http\Controllers\root\OfferController')->middleware('auth');
Route::resource('skill','\App\Http\Controllers\root\UserSkillController')->middleware('auth');
Route::resource('viewtask/viewprofile','\App\Http\Controllers\root\ViewProfileController')->middleware('auth');
Route::get('/viewtask/accept_offer/{offer_id}', "root\AcceptOfferController@Accept")->middleware('auth');
Route::get('/viewtask/finish_offer/{id}', "root\AcceptOfferController@finish")->middleware('auth');
Route::get('/viewtask/createmessage/{id}/{jobid}',array(
    'as' => 'create-message-job',
    'uses' => 'root\messagecontroller@create'))->middleware('auth');
Route::get('/message',"root\messagecontroller@index")->middleware('auth');
Route::get('/viewcons/{id}',"root\conversationcontroller@index")->middleware('auth');
Route::post('/viewcons/send_message/{id}', "root\conversationcontroller@post_message")->middleware('auth');
Route::post('/changepass', "root\changepasscontroller@changepass")->middleware('auth');
Route::get('/log',"root\UserProfileController@creditlog")->middleware('auth');
Route::post('/uploadpicskill','\App\Http\Controllers\root\UserSkillController@uploadpic')->middleware('auth');
Route::get('/email', function () {
    return view('send_email');
})->middleware('auth');
Route::post('/sendEmail', 'Email@sendEmail')->middleware('auth');
Route::post('/payment/{id}','Email@sendInvoice')->middleware('auth');
Route::get('/deleteoffer/{id}','root\AcceptOfferController@cancel')->middleware('auth');
Route::post('/posttopup','root\CreditController@topup')->middleware('auth');
Route::post('/postwithdraw','root\CreditController@withdraw')->middleware('auth');
Route::get('/withdraw','root\CreditController@indexwithdraw')->middleware('auth');
Route::get('/topup','root\CreditController@indextopup')->middleware('auth');
Route::post('/confirmation/{id}','root\CreditController@confirmation')->middleware('auth');
Route::get('/openchat/{id}',"root\Reportmessagecontroller@openchatadmin")->middleware('auth');
Route::get('/reportmessage',"root\Reportmessagecontroller@indexuser")->middleware('auth');
Route::get('/generate',"root\Reportmessagecontroller@generate")->middleware('auth');
Route::get('/viewreport/{id}',"root\Reportmessagecontroller@getcons")->middleware('auth');
Route::post('/viewreport/report_message/{id}', "root\Reportmessagecontroller@post_message")->middleware('auth');
Route::post('/report_message/{id}', "root\Reportmessagecontroller@post_message")->middleware('auth');
Route::get('/showimage/{id}',"Admin\AdminController@showimage")->middleware('auth');
Route::get('/viewtask/poster_acc/{id}','root\edittaskcontroller@posteracc')->middleware('auth');
Route::get('/viewtask/worker_acc/{id}','root\edittaskcontroller@workeracc')->middleware('auth');
Route::get('/viewtask/poster_com/{id}','root\edittaskcontroller@postercom')->middleware('auth');
Route::get('/viewtask/worker_com/{id}','root\edittaskcontroller@workercom')->middleware('auth');
Route::get('/viewtask/poster_fail/{id}','root\edittaskcontroller@posterfail')->middleware('auth');
Route::get('/viewtask/worker_fail/{id}','root\edittaskcontroller@workerfail')->middleware('auth');
Route::get('/viewtask/acceptjob/{id}','root\acceptoffercontroller@acceptbyworker')->middleware('auth');
Route::get('/viewtask/rejectjob/{id}','root\acceptoffercontroller@rejectbyworker')->middleware('auth');
Route::get('/viewtask/reportjob/{id}','root\reporttaskcontroller@index')->middleware('auth');
Route::post('/reporttask/{id}','root\reporttaskcontroller@uploadevidence')->middleware('auth');
Route::get('/receiveless/{id}','root\creditcontroller@indexreceiveless')->middleware('auth');
Route::get('/receivemore/{id}','root\creditcontroller@indexreceivemore')->middleware('auth');
Route::post('/receiveless/{id}','root\creditcontroller@receiveless')->middleware('auth');
Route::post('/receivemore/{id}','root\creditcontroller@receivemore')->middleware('auth');
Route::get('/continueatoffice/{id}','root\reporttaskcontroller@continueatoffice')->middleware('auth');
Route::get('/evidence/{id}','root\reporttaskcontroller@evidence')->middleware('auth');
Route::get('/posterright/{id}','root\reporttaskcontroller@posterright')->middleware('auth');
Route::get('/workerright/{id}','root\reporttaskcontroller@workerright')->middleware('auth');