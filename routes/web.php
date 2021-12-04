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
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

// Manufacturers Route
Route::group(['prefix' => 'manufacturers'], function() {
    Route::get('/', 'ManufacturerController@index');
    Route::get('/add', 'ManufacturerController@add');
    Route::post('/store', 'ManufacturerController@store')->name('manufacturers.store');
    Route::get('/{id}/edit', 'ManufacturerController@edit')->name('manufacturers.edit');
    Route::post('/{id}/update', 'ManufacturerController@update')->name('manufacturers.update');
    Route::get('/{id}/delete', 'ManufacturerController@delete')->name('manufacturers.delete');
});


// Customers Route
Route::group(['prefix' => 'customers'], function() {
Route::get('/', 'CustomerController@index');
Route::get('/add', 'CustomerController@add');
Route::post('/store', 'CustomerController@store')->name('customers.store');
Route::get('/{id}/edit', 'CustomerController@edit')->name('customers.edit');
Route::post('/{id}/update', 'CustomerController@update')->name('customers.update');
Route::get('/{id}/delete', 'CustomerController@delete')->name('customers.delete');
});

// Medicine Route
Route::group(['prefix' => 'medicine'], function() {
Route::get('/', 'MedicineController@index');
Route::get('/add', 'MedicineController@add');
Route::post('/store', 'MedicineController@store')->name('medicine.store');
Route::get('/{id}/edit', 'MedicineController@edit')->name('medicine.edit');
Route::post('/{id}/update', 'MedicineController@update')->name('medicine.update');
Route::get('/{id}/delete', 'MedicineController@delete')->name('medicine.delete');
// Medicine Category Route
Route::get('/category', 'MedicineController@medicine_cat');
Route::post('/cat_store', 'MedicineController@cat_store')->name('medicine.cat_store');
Route::get('/{id}/cat_edit', 'MedicineController@cat_edit')->name('medicine.cat_edit');
Route::post('/{id}/cat_update', 'MedicineController@cat_update')->name('medicine.cat_update');
Route::get('/{id}/cat_delete', 'MedicineController@cat_delete')->name('medicine.cat_delete');
// Medicine Type Route
Route::get('/type', 'MedicineController@medicine_type');
Route::post('/type_store', 'MedicineController@type_store')->name('medicine.type_store');
Route::get('/{id}/type_edit', 'MedicineController@type_edit')->name('medicine.type_edit');
Route::post('/{id}/type_update', 'MedicineController@type_update')->name('medicine.type_update');
Route::get('/{id}/type_delete', 'MedicineController@type_delete')->name('medicine.type_delete');
// Medicine Unit Route
Route::get('/unit', 'MedicineController@medicine_unit');
Route::post('/unit_store', 'MedicineController@unit_store')->name('medicine.unit_store');
Route::get('/{id}/unit_edit', 'MedicineController@unit_edit')->name('medicine.unit_edit');
Route::post('/{id}/unit_update', 'MedicineController@unit_update')->name('medicine.unit_update');
Route::get('/{id}/unit_delete', 'MedicineController@unit_delete')->name('medicine.unit_delete');
});

// Bank Route
Route::group(['prefix' => 'bank'], function() {
    Route::get('/', 'BankController@index');
    Route::get('/add', 'BankController@add');
    Route::post('/store', 'BankController@store')->name('bank.store');
    Route::get('/{id}/edit', 'BankController@edit')->name('bank.edit');
    Route::post('/{id}/update', 'BankController@update')->name('bank.update');
    Route::get('/{id}/delete', 'BankController@delete')->name('bank.delete');
});


//company  route
Route::group(['prefix' => '/'], function() {
     Route::resource('company', 'CompanyController');
   
});



// Supplier Route
Route::group(['prefix' => 'supplier'], function() {
    Route::get('/', 'SupplierController@index');
    Route::get('/add', 'SupplierController@add');
    Route::post('/store', 'SupplierController@store')->name('supplier.store');
    Route::get('/{id}/edit', 'SupplierController@edit')->name('supplier.edit');
    Route::post('/{id}/update', 'SupplierController@update')->name('supplier.update');
    Route::get('/{id}/delete', 'SupplierController@delete')->name('supplier.delete');
});

// Purchase Route
Route::group(['prefix' => 'purchase'], function() {
    Route::get('/', 'PurchaseController@index');
    Route::get('/add', 'PurchaseController@add');
    Route::post('/store', 'PurchaseController@store')->name('purchase.store');
    Route::get('/{id}/show', 'PurchaseController@show')->name('purchase.show');
    Route::get('/{id}/delete', 'PurchaseController@delete')->name('purchase.delete');
    Route::get('/search','PurchaseController@search')->name('purchase.search');
  //  Route::get('/{id}/edit', 'PurchaseController@edit')->name('purchase.edit');
 //   Route::post('/{id}/update', 'PurchaseController@update')->name('purchase.update');
 //   Route::get('/{id}/delete', 'PurchaseController@delete')->name('purchase.delete');
    });
    Route::get('/addajax','PurchaseController@addajax');
    Route::get('/addPrice','PurchaseController@addprice');


Route::group(['prefix' => 'stock'], function() {
    Route::get('/', 'StockController@quantity');

    });


Route::group(['prefix' => '/'], function() {
     Route::resource('/account', 'AccountController');
     Route::get('/expadd','AccountController@expadd')->name('account.expadd');
     Route::get('/expcreate','AccountController@exp_create')->name('account.exp_create');
     Route::get('/explist','AccountController@exp_list')->name('account.explist');
     Route::get('/{id}/expense_delete','AccountController@d')->name('account.d');
     Route::get('/income','AccountController@income')->name('total.income');
   
});


Route::group(['prefix' => '/due'], function() {

     Route::get('/CustomerDue','DueController@customer')->name('due.customer');
     Route::get('/{id}/CusDueShow','DueController@show')->name('due.show');
     Route::get('/amount/store','DueController@store')->name('amount.store');
     Route::get('/{id}/amount/total','DueController@total')->name('amount.total');

     Route::get('/ManufacturerDue','DueController@manufacturer')->name('due.manufacturer');
     Route::get('/{id}/ManuDueShow','DueController@manuShow')->name('manu.show');
     Route::get('manu/amount/store','DueController@manustore')->name('manu.store');
     Route::get('/{id}/manufacturer/total','DueController@manutotal')->name('manu.total');

});


// Sales Route
Route::group(['prefix' => 'sales'], function() {
    Route::get('/', 'SalesController@index');
    Route::get('/add', 'SalesController@add');
    Route::post('/store', 'SalesController@store')->name('sales.store');
    Route::get('/{id}/delete', 'SalesController@delete')->name('sale.delete');
    Route::get('/{id}/show', 'SalesController@show')->name('sale.show');
    Route::get('/search', 'SalesController@search')->name('sale.search');
});
Route::get('/batchID','SalesController@batchID');
Route::get('/expired','SalesController@expired');
Route::get('/unitPrice','SalesController@unitPrice');
