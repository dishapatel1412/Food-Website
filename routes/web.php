<?php

use App\Http\Controllers\Customer_LoginController;
use App\Http\Controllers\Customer_RegisterController;
use App\Http\Controllers\Vendor_LoginController;
use App\Http\Controllers\Vendor_RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer_dashboard');
});

Route::get('/customer-register', function () {
    return view('customer_register');
});

Route::get('/customer-login', function () {
    return view('customer_login');
});

Route::get('/admin', function () {
    return view('admin_dashboard');
});

Route::get('/admin-login', function () {
    return view('admin_login');
});

Route::get('/vendor', function () {
    return view('vendor_dashboard');
});

Route::get('/vendor-register', function () {
    return view('vendor_register');
});

Route::get('/vendor-login', function () {
    return view('vendor_login');
});

Route::get('/customer-register',[Customer_RegisterController::class,'customer']);
Route::post('/customer-register',[Customer_RegisterController::class,'register_customer']);
Route::get('/customer-login',[Customer_LoginController::class,'loginPage']);
Route::post('/customer-login',[Customer_LoginController::class,'login_customer']);

Route::get('/vendor-register',[Vendor_RegisterController::class,'vendor']);
Route::post('/vendor-register',[Vendor_RegisterController::class,'register_vendor']);
Route::get('/vendor-login',[Vendor_LoginController::class,'loginPage']);
Route::post('/vendor-login',[Vendor_LoginController::class,'login_vendor']);

