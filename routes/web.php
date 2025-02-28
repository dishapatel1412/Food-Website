<?php

use App\Http\Controllers\Admin_LoginController;
use App\Http\Controllers\Customer_LoginController;
use App\Http\Controllers\Customer_RegisterController;
use App\Http\Controllers\FoodItems_Controller;
use App\Http\Controllers\Vendor_LoginController;
use App\Http\Controllers\Vendor_RegisterController;
use Illuminate\Support\Facades\Route;

// Customer Dashboard
Route::get('/', function () {
    return view('customer_dashboard');
});

// Customer Registration Form
Route::get('/customer-register', function () {
    return view('customer_register');
});

// Customer Login Form
Route::get('/customer-login', function () {
    return view('customer_login');
});

// Admin Dashboard
Route::get('/admin', function () {
    return view('admin_dashboard');
});

// Admin Login Form
Route::get('/admin-login', function () {
    return view('admin_login');
});

// Vendor Dashboard
Route::get('/vendor', function () {
    return view('vendor_dashboard');
});

// Vendor Registration Form
Route::get('/vendor-register', function () {
    return view('vendor_register');
});

// Vendor Login Form
Route::get('/vendor-login', function () {
    return view('vendor_login');
});

// About Us Page
Route::get('/about-us', function () {
    return view('aboutus');
});

// Privacy Policy Page
Route::get('/privacy-policy', function () {
    return view('privacypolicy');
});

// Terms and Condition Page
Route::get('/terms-condition', function () {
    return view('termsandconditions');
});

// Contact Us Page
Route::get('/contact-us', function () {
    return view('contactus');
});

// Customer Routes
// Customer Registration Routes
Route::get('/customer-register',[Customer_RegisterController::class,'customer']);
Route::post('/customer-register',[Customer_RegisterController::class,'register_customer']);
// Customer Login Routes
Route::get('/customer-login',[Customer_LoginController::class,'loginPage']);
Route::post('/customer-login',[Customer_LoginController::class,'login_customer']);

// Vendor Routes
// Vendor Registration Routes
Route::get('/vendor-register',[Vendor_RegisterController::class,'vendor']);
Route::post('/vendor-register',[Vendor_RegisterController::class,'register_vendor']);
// Vendor Login Routes
Route::get('/vendor-login',[Vendor_LoginController::class,'loginPage']);
Route::post('/vendor-login',[Vendor_LoginController::class,'login_vendor']);

// Admin Login Routes
Route::get('/admin-login',[Admin_LoginController::class,'loginPage']);
Route::post('/admin-login',[Admin_LoginController::class,'login_admin']);

// Customer Logout Route
Route::post('/customer/logout',[Customer_LoginController::class,'logout_customer'])->name('logout_customer');

// Vendor Logout Route
Route::post('/vendor/logout',[Vendor_LoginController::class,'logout_vendor'])->name('logout_vendor');

// Admin Logout Route
Route::post('/admin/logout',[Admin_LoginController::class,'logout_admin'])->name('logout_admin');

// Routes for adding a food item by a vendor and displaying it on dashboard
Route::post('/food-items',[FoodItems_Controller::class,'add_items']);
Route::get('/my-profile',[FoodItems_Controller::class,'display_items']);

