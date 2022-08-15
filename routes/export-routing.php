<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/export')->group(function () {
    Route::get('/', 'ExportController@index')->name('export.index');
    Route::get('/acc-transaction', 'AccTransactionController@export')->name('acc-transaction-export');
    Route::get('/account', 'AccountController@export')->name('account-export');
    Route::get('/branch', 'BranchController@export')->name('branch-export');
    Route::get('/business', 'BusinessController@export')->name('business-export');
    Route::get('/customer', 'CustomerController@export')->name('customer-export');
    Route::get('/department', 'DepartmentController@export')->name('department-export');
    Route::get('/employee', 'EmployeeController@export')->name('employee-export');
    Route::get('/individual', 'IndividualController@export')->name('individual-export');
    Route::get('/officer', 'OfficerController@export')->name('officer-export');
    Route::get('/product', 'ProductController@export')->name('product-export');
    Route::get('/product-type', 'ProductTypeController@export')->name('product-type-export');
});
