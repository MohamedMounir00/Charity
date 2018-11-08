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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group([ 'middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource ('user','Backend\UserController');
    Route::post('get_cities','Backend\UserController@get_cities')->name('get_cities');

    Route::resource('catogrey', 'Backend\CatograyController');
    Route::resource('donation', 'Backend\DonationController');
    Route::get('archiveDonation', 'Backend\DonationController@ArchiveDonation')->name('archiveDonation');

    //////order edit
    Route::get('gettorderdonation/{id}', 'Backend\DonationController@gettorderdonation')->name('gettorderdonation');
    Route::post('postorderdonation/{id}', 'Backend\DonationController@postorderdonation')->name('postorderdonation');
    ///orderdelete

    /////delete
    Route::get('getdelete/{id}', 'Backend\DonationController@getdelete')->name('getdelete');
    Route::post('postdonationdel/{id}', 'Backend\DonationController@postdonationdel')->name('postdonationdel');
    Route::resource('order', 'Backend\OrderController');
    Route::resource('office', 'Backend\OfficeController');
    Route::resource('beneficiary', 'Backend\beneficiaries');
    Route::resource('delavery', 'Backend\DelavaryController');
    Route::resource('resignation', 'Backend\ResignationController');
    Route::get('accept', 'Backend\ResignationController@accept')->name('accept');
    Route::resource('typeDonation', 'Backend\DonationTypeController');
    Route::resource('roles','Backend\RoleController');
    Route::get('/messages','Api\ChatController@getMessages');
    Route::post('/sendMessage','Api\ChatController@sendMessage');
    Route::get('/printDon/{don_id}','Api\CatOrderController@printDon')->name('printDon');
    Route::get('/printdelavey/{d}','Api\CatOrderController@printdelavey')->name('printdelavey');
    Route::get('/reportfordon','Api\CatOrderController@reportfordon')->name('reportfordon');
    Route::get('/reportfordelavary','Api\CatOrderController@reportfordelavary')->name('reportfordelavary');


});

