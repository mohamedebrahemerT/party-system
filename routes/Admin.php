<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace'=>'Admin'],function(){

    Route::group(['middleware' => 'guest'], function () {

Route::get('/','AdminController@viwlogin');
Route::get('/admin_login','AdminController@viwlogin');
Route::get('/admin','AdminController@viwlogin');
Route::post('/admin_login','AdminController@admin_login');
     });

// Forget Routes
        Route::post('admin/password/forget', 'Auth\ForgotPasswordController@forget');
        // Reset Routes
        Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@renderReset');
        Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset');

    Route::view('need/permission', 'admin.no_permission');
     
Route::group(['middleware' => 'admin:admin'], function () {
Route::get('/dashboard','AdminController@dashboard');
Route::get('Admin_logout', 'AdminController@Admin_logout_fun');
Route::resource('admins', 'AdminController');
Route::get('admins/{id}/destroy', 'AdminController@destroy');
 

    Route::resource('roles', 'rolesController');
Route::get('roles/{id}/destroy', 'rolesController@destroy');
Route::get('roles/addpermissions/{Role_id}', 'rolesController@addpermissions');
Route::post('roles/addpermissions', 'rolesController@addpermissionsPOST');
 
Route::resource('AdminGroup', 'AdminGroupController');

    //Departments
    Route::resource('Departments', 'DepartmentController');
    Route::get('Departments/{id}/destroy', 'DepartmentController@destroy');

      //Member
    Route::resource('Member', 'MemberController');
    Route::get('Member/{id}/destroy', 'MemberController@destroy');

      //suppliers
Route::resource('suppliers', 'suppliersController');
Route::get('suppliers/{id}/destroy', 'suppliersController@destroy');
Route::post('suppliers/actived', 'suppliersController@actived');

      //warehouses
    Route::resource('warehouses', 'warehousesController');
Route::get('warehouses/{id}/destroy', 'warehousesController@destroy');
Route::post('warehouses/actived', 'warehousesController@actived');

      //currency
Route::resource('currency', 'currencyController');
Route::get('currency/{id}/destroy', 'currencyController@destroy');
Route::post('currency/actived', 'currencyController@actived');

      //tax
Route::resource('tax', 'taxController');
Route::get('tax/{id}/destroy', 'taxController@destroy');
Route::post('tax/actived', 'taxController@actived');

      //TypesOfExpenses
 Route::resource('TypesOfExpenses', 'TypesOfExpensesController');
Route::get('TypesOfExpenses/{id}/destroy', 'TypesOfExpensesController@destroy');

      //expenses
 Route::resource('expenses', 'expensesController');
Route::get('expenses/{id}/destroy', 'expensesController@destroy');

      //Cities
Route::resource('adminShowCities', 'CitiesController');
Route::get('ShowCities/{id}', 'CitiesController@ShowCities');
Route::get('adminShowCities/{id}/destroy', 'CitiesController@destroy');
Route::get('adminShowCities/{id}/destroy', 'CitiesController@destroy');
Route::post('/adminShowCities/actived','CitiesController@actived')->name('adminShowCities.actived');

      //subCity
Route::resource('subCity', 'subCityController');
Route::get('subCity/{id}/destroy', 'subCityController@destroy');

      //subsubCity
Route::resource('subsubCity', 'subsubCityController');
Route::get('subsubCity/{id}/destroy', 'subsubCityController@destroy');

   
      //AdminNotifications
 Route::get('/AdminNotifications', 'AdminNotificationsController@index');
          Route::get('AdminNotifications/{id}/destroy', 'AdminNotificationsController@destroy');
 Route::get('/AdminNotifications/create', 'AdminNotificationsController@create')->name('.create');
            Route::post('/AdminNotifications/store', 'AdminNotificationsController@store')->name('.store');
            Route::get('/show/{slug}', 'AdminNotificationsController@show')->name('.show');
            Route::post('/delete', 'AdminNotificationsController@delete')->name('.delete');
            Route::post('/delete-multi', 'AdminNotificationsController@deleteMulti')->name('.deleteMulti');

      //invioce
            Route::resource('/invioce','invioceController');
Route::get('invioce/{id}/destroy', 'invioceController@destroy');
Route::get('invioceprint/{id}', 'invioceController@invioceprint');
Route::get('pdfview',array('as'=>'pdfview','uses'=>'invioceController@pdfview'));
Route::get('showinvioce/{id}', 'invioceController@showinvioce');

      //Settings
Route::get('Settings/edit', 'SettingsController@edit');
Route::post('Settings/update', 'SettingsController@update');



  });

});


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    return 'Application cache cleared';
});

Route::get('/storage', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    return 'Storage Linked';
});
