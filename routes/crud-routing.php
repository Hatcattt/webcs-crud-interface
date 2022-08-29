<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccTransactionController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use Illuminate\Support\Facades\Route;

Route::resource('/crud/acc-transaction', AccTransactionController::class);
Route::resource('/crud/account', AccountController::class);
Route::resource('/crud/branch', BranchController::class);
Route::resource('/crud/business', BusinessController::class);
Route::resource('/crud/customer', CustomerController::class);
Route::resource('/crud/department', DepartmentController::class);
Route::resource('/crud/employee', EmployeeController::class);
Route::resource('/crud/individual', IndividualController::class);
Route::resource('/crud/officer', OfficerController::class);
Route::resource('/crud/product', ProductController::class);
Route::resource('/crud/product-type', ProductTypeController::class);