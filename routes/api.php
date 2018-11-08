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
Route::middleware(['auth:api'])->group(function () {
    Route::resource ('user','Api\UserController');
    ///////////////////////////////////////donation
    Route::resource ('donation','Api\DonationController');
    Route::get ('getdelete/{id}','Api\DonationController@getdelete');
    Route::post ('postDelete/{id}','Api\DonationController@postDelete');
    Route::post ('updateDonation/{id}','Api\DonationController@updateDonation');
    Route::get ('archiveDonation','Api\DonationController@ArchiveDonation');
    Route::get ('getAllCitiesByCountryId','Api\UserController@getAllCitiesByCountryId');
    Route::get ('getAllofficesBycity','Api\UserController@getAllofficesBycity');
    //////////////////////office
    Route::get ('AllOffice','Api\OfficeController@index');
    Route::get ('getcreateOffice','Api\OfficeController@create');
    Route::post ('postcreateOffice','Api\OfficeController@store');
    Route::get ('getupdateOffice/{id}','Api\OfficeController@edit');
    Route::post ('postupdateOffice/{id}','Api\OfficeController@update');
    Route::post ('deleteOffice/{id}','Api\OfficeController@destroy');
    //////////////////////cats
    Route::get ('Allcats','Api\CatograyController@index');
   // Route::get ('getcreatecats','Api\CatograyController@create');
    Route::post ('postcreatecats','Api\CatograyController@store');
    Route::get ('getupdatecats/{id}','Api\CatograyController@edit');
    Route::post ('postupdatecats/{id}','Api\CatograyController@update');
    Route::post ('deletecats/{id}','Api\CatograyController@destroy');

////////////////////////////for poor/////////////
    Route::post ('createbeneficiaries','Api\beneficiaries@store');
    Route::get ('getbeneficiaries/{id}','Api\beneficiaries@edit');
    Route::post ('upatebeneficiaries/{id}','Api\beneficiaries@update');
    Route::post ('deleteuser/{id}','Api\beneficiaries@destroy');
    Route::get ('beneficiary','Api\beneficiaries@index');
/////////////////////////////////fore delavary
///
    Route::get ('getcreateDelavary','Api\DelavaryController@create');

    Route::post ('createDelavary','Api\DelavaryController@store');
    Route::get ('getDelavary/{id}','Api\DelavaryController@edit');
    Route::post ('upatebDelavarys/{id}','Api\DelavaryController@update');
    Route::post ('deleteDelavary/{id}','Api\DelavaryController@destroy');
    Route::get ('allDelavary','Api\DelavaryController@index');
///////////////////////////////////////////////////////////// Resignation///////////
///
///

    Route::post ('createResignation','Api\ResignationController@store');
    Route::get ('getResignationy/{id}','Api\ResignationController@edit');
    Route::post ('upatebResignation/{id}','Api\ResignationController@update');
    Route::post ('deleteResignation/{id}','Api\ResignationController@destroy');
    Route::get ('allResignation','Api\ResignationController@index');
    ///////////////////////////////////////////////////donation Type/////////
    Route::post ('createDonationType','Api\DonationTypeController@store');
    Route::get ('getDonationType/{id}','Api\DonationTypeController@edit');
    Route::post ('upateDonationType/{id}','Api\DonationTypeController@update');
    Route::post ('deleteDonationType/{id}','Api\DonationTypeController@destroy');
    Route::get ('allDonationType','Api\DonationTypeController@index');

    Route::get('/messages','Api\ChatController@getMessages');
    Route::post('/sendMessage','Api\ChatController@sendMessage');
    Route::get('/printDon/{don_id}','Api\CatOrderController@printDon');
    Route::get('/printdelavey/{d}','Api\CatOrderController@printdelavey');
    Route::get('/reportfordon','Api\CatOrderController@reportfordon');
    Route::get('/reportfordelavary','Api\CatOrderController@reportfordelavary');
    Route::get('getprimission','Api\UserController@getprimission');

});

Route::get('/messages','Api\ChatController@getMessages');
Route::post('/sendMessage','Api\ChatController@sendMessage');
Route::post('login','Api\UserController@login');
