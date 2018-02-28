<?php


Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('login');;
Route::post('login', 'Auth\AdminLoginController@login');
Route::post('logout', 'Auth\AdminLoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth:admin'], 'prefix' => 'adminMg', 'as' => 'adminMg.'], function () {
    Route::get('/', 'HomeController@adminMg');
    Route::get('/getAdminTableInfo', 'Web\AdminController@getAdminTableInfo');
    Route::get('/getAdminInfo/{id?}', 'Web\AdminController@getAdminInfo');
    Route::post('/create', 'Web\AdminController@createAdmin');
    Route::post('/update', 'Web\AdminController@updateAdmin');
    Route::post('/activate', 'Web\AdminController@activate');
    Route::post('/resetPassword', 'Web\AdminController@resetPassword');
    Route::post('/removeAdmin', 'Web\AdminController@removeAdmin');
    Route::get('/duplicationEmail', 'Web\AdminController@duplicationEmail');
    Route::get('/MessageMg/{id?}', 'userMgGate@MessageMg');
});

//agent manager page

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'agentMg', 'as' => 'agentMg.'], function () {
    Route::get('/', 'HomeController@agentMg');
    Route::get('/getAgentTableInfo', 'Web\UserController@getAgentTableInfo');
    Route::get('/getAgentDetailInfo/{id}', 'Web\UserController@getAgentDetailInfo');
    Route::post('/test', 'Web\UserController@test');
    Route::post('/create/{id?}', 'Web\UserController@create');
    Route::post('/removeAgent', 'Web\UserController@removeAgent');
    Route::post('/resetPassword', 'Web\UserController@resetPassword');
    Route::post('/update/{id?}', 'Web\UserController@update');
});
//
//customer manage page

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'custom', 'as' => 'custom.'], function () {
    Route::get('/', 'HomeController@customerMg');
    Route::get('/getCustomTableInfo', 'Web\UserController@getCustomTableInfo');
    Route::get('/getCustomDetailInfo/{id?}', 'Web\UserController@getCustomDetailInfo');
    Route::post('/resetPassword', 'Web\UserController@resetPassword');
    Route::post('/removeCustomter/', 'Web\UserController@removeCustomer');
});
// setting module

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'setting', 'as' => 'setting.'], function () {
    Route::get('/insurance', 'HomeController@insurance');
    Route::get('/getInsuranceTableInfo', 'Web\SettingController@getInsuranceTable');
    Route::get('/getInsurance/{id?}', 'Web\SettingController@getInsurance');
    Route::post('/addInsurance', 'Web\SettingController@addInsurance');
});
// Job CMS module
<<<<<<< HEAD

=======
>>>>>>> e1cd872238f50e9b6d7594345626d73cd28facb2
Route::group(['middleware' => [], 'prefix' => 'jobs', 'as' => 'jobs.'], function () {
    Route::get('/', 'HomeController@jobsMg');
    Route::get('/getJobListData', 'Web\JobsController@getJobList');
    Route::get('/getjobdetail/{id?}', 'Web\JobsController@JobDetailView');
    Route::get('/getQuotationList/{id?}', 'Web\JobsController@getQuotationList');
    Route::get('/getDocumentList/{id?}', 'Web\JobsController@getDocumentList');
    Route::get('/getAssignedJobList/{id?}', 'Web\JobsController@getAssignedJobList');
    Route::post('/removeJob', 'Web\JobsController@removeJob');
});
