<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('user', 'Api\UserController@getAllUsers');
Route::get('user/{id}', 'Api\UserController@getUser');
Route::post('user', 'Api\UserController@addUser');
Route::delete('user/{id}', 'Api\UserController@deleteUser');

Route::get('user_type', 'UserTypeController@getAllUserType');
Route::get('user_type/{id}', 'UserTypeController@getUserType');
Route::post('user_type', 'UserTypeController@addUserType');
Route::put('user_type/{id}', 'UserTypeController@updateUserType');
Route::delete('user_type/{id}', 'UserTypeController@deleteUserType');

Route::get('user_profile/{id}', 'UserProfileController@getUserProfile');
Route::post('user_profile', 'UserProfileController@addUserProfile');
Route::put('user_profile/{id}', 'UserProfileController@updateUserProfile');

Route::get('user_skill/{id}', 'UserSkillController@getUserSkill');
Route::post('user_skill', 'UserSkillController@addUserSkill');
Route::put('user_skill/{id}', 'UserSkillController@updateUserSkill');

Route::get('job_post', 'Api\JobPostController@getAllJobPost');
Route::get('job_post/{id}', 'Api\JobPostController@getJobPostByCategory');
Route::post('job_post', 'Api\JobPostController@addJobPost');
Route::put('job_post/{id}', 'Api\JobPostController@updateJobPost');
Route::delete('job_post/{id}', 'Api\JobPostController@deleteJobPost');

Route::get('payment_detail/{id}', 'PaymentDetailController@getPaymentDetail');
Route::post('payment_detail', 'PaymentDetailController@addPaymentDetail');
Route::put('payment_detail/{id}', 'PaymentDetailController@updatePaymentDetail');
Route::delete('payment_detail/{id}', 'PaymentDetailController@deletePaymentDetail');

Route::get('category','Api\CategoryController@getCategory');
Route::get('messages/{id}','Api\messagecontroller@get');
Route::post('newmessage/{id}','Api\messagecontroller@post_message');