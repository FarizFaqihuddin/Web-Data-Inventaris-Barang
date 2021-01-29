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

 Route::group(['middleware' => ['menu','auth']], function () {
    Route::get('/', function () {
        // welcome
        return view('index');
    })->name('dashboard');
    
    Route::post('role_menus/mass_store', 'RoleMenusController@mass_store')->name('role_menus.mass_store');
    Route::get('roles/{id}/access', 'RolesController@access')->name('role.access');
    Route::resource('roles', 'RolesController');
    Route::resource('menus', 'MenusController');
    Route::resource('role_menus', 'RoleMenusController', [
        'names' => [
            'store'   => 'role_menus.store'
        ],
    ]);
    
    // Route::get('home', 'HomeController@index')->name('home');
    Route::get('employees/excel', 'EmployeesController@laporanExcel');
    Route::get('employees/{id}/detail', 'EmployeesController@detail')->name('employee.detail');
    Route::get('employees/{id}/employeedetail', 'EmployeesController@employeedetail')->name('employee.employeedetail');
    Route::resource('employees', 'EmployeesController');

    Route::resource('brands', 'BrandsController');
	Route::resource('categories', 'CategoriesController');
    Route::get('items/excel', 'ItemsController@laporanExcel');
    Route::get('items/{id}/detail', 'ItemsController@detail')->name('item.detail');
    Route::resource('items', 'ItemsController');
    
    Route::get('purchases/excel', 'PurchasesController@laporanExcel');
    Route::get('purchases/detail', 'PurchasesController@detail')->name('purchase.detail');
    Route::get('purchases/{id}/invoicedetail', 'PurchasesController@invoicedetail')->name('purchase.invoicedetail');
    Route::resource('purchases', 'PurchasesController');

    Route::get('reports', 'MutationsController@reportExcel');
    Route::get('mutations/excel', 'MutationsController@laporanExcel');
    Route::get('mutations/detail', 'MutationsController@detail')->name('mutation.detail');
    Route::get('mutations/{id}/mutationDetail', 'MutationsController@mutationDetail')->name('mutation.mutationDetail');
    Route::resource('mutations', 'MutationsController');

});
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();