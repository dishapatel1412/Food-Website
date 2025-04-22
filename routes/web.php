<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodItemsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RazorpayController;

Route::view('/','customer_dashboard')->name('customer_dashboard');
Route::view('/about-us','aboutus')->name('aboutus');
Route::view('/privacy-policy','privacypolicy')->name('privacypolicy');
Route::view('/terms-conditions','termsandconditions')->name('termsandconditions');

// Customer Routes
Route::get('/customer-register', [CustomerController::class, 'registerCustomer'])->name('customer_register');
Route::post('/customer-save', [CustomerController::class, 'validateCustomer'])->name('customer_save');
Route::get('/customer-login', [CustomerController::class, 'loginCustomer'])->name('customer_login');
Route::post('/verify-customer', [CustomerController::class, 'loginValidate'])->name('verify_customer');
Route::get('/customer-dashboard', [CustomerController::class, 'dashboardCustomer'])->name('customer_dashboard');
Route::get('/order-now', [CustomerController::class, 'orderNow'])->name('order_now');
Route::get('/fetch-cities/{state_id}', [CustomerController::class, 'fetchCities'])->name('get_cities');
Route::get('/get-restaurants', [CustomerController::class, 'getRestaurants'])->name('get_restaurants');
Route::get('/restaurants/menu', [CustomerController::class, 'restaurantMenu'])->name('restaurant_menu');
Route::get('/my-orders', [CustomerController::class, 'myOrders'])->name('my_orders');
Route::post('/add-to-cart/{item_id}', [CustomerController::class, 'addToCart'])->name('add_to_cart');
Route::get('/cart', [CustomerController::class, 'showCart'])->name('show_cart');
Route::post('/remove-from-cart/{id}', [CustomerController::class, 'removeFromCart'])->name('remove_from_cart');
Route::get('/cart-page', [CustomerController::class, 'showCart']);

Route::post('/cancel-order/{orderId}', [CustomerController::class, 'cancelOrder'])->name('cancel_order');
Route::get('/customer-logout', [CustomerController::class, 'logoutCustomer'])->name('customer_logout');

//Vendor Routes
Route::get('/vendor-register', [VendorController::class, 'registerVendor'])->name('vendor_register');
Route::post('/vendor-save', [VendorController::class, 'validateVendor'])->name('vendor_save');
Route::get('/vendor-login', [VendorController::class, 'loginVendor'])->name('vendor_login');
Route::post('/verify-vendor', [VendorController::class, 'loginValidate'])->name('verify_vendor');
Route::get('/vendor-dashboard', [VendorController::class, 'dashboardVendor'])->name('vendor_dashboard');
Route::get('/vendor-logout', [VendorController::class, 'logoutVendor'])->name('vendor_logout');
Route::post('/vendor/additems', [FoodItemsController::class, 'add_items'])->name('add_items');
Route::get('/vendor/getitems', [VendorController::class, 'get_items'])->name('get_items');
Route::get('/vendor/displayitems', [VendorController::class, 'display_items'])->name('display_items');
Route::get('/vendor/vieworders', [VendorController::class, 'view_orders'])->name('view_orders');
Route::get('/vendor/pastorders', [VendorController::class, 'past_orders'])->name('past_orders');
Route::get('/vendor-register', [VendorController::class, 'getState'])->name('get_states');
Route::get('/fetch-cities/{state_id}', [VendorController::class, 'fetchCities'])->name('get_cities');
Route::post('/update-order-status/{orderId}', [VendorController::class, 'updateOrderStatus'])->name('update_order_status');

// Food Items Routes
Route::post('/trash/{id}', [FoodItemsController::class, 'trash'])->name('trash');
Route::post('/restore/{id}', [FoodItemsController::class, 'restore'])->name('restore');
Route::post('/delete/{id}', [FoodItemsController::class, 'delete'])->name('delete');
Route::get('/get-trashed-items', [FoodItemsController::class, 'getTrashedItems'])->name('get_trashed_items');

// Order Routes
// web.php
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place_order');
Route::post('/vendor/update-order-status/{id}', [OrderController::class, 'updateStatus'])->name('update_order_status');

// Admin Routes
Route::get('/admin-login', [AdminController::class, 'loginAdmin'])->name('admin_login');
Route::post('/verify-admin', [AdminController::class, 'validateAdmin'])->name('verify_admin');
Route::get('/admin-dashboard', [AdminController::class, 'dashboardAdmin'])->name('admin_dashboard');
Route::get('/admin-logout', [AdminController::class, 'logoutAdmin'])->name('admin_logout');
Route::get('/admin/view-vendors', [AdminController::class, 'viewVendors'])->name('view_vendors');
Route::post('/vendors/{vendorId}/approve', [AdminController::class, 'approveVendor'])->name('approve_vendor');
Route::post('/vendors/{vendorId}/reject', [AdminController::class, 'rejectVendor'])->name('reject_vendor');
Route::get('/admin/view-customers', [AdminController::class, 'viewCustomers'])->name('view_customers');
Route::get('/admin/total-sales', [AdminController::class, 'totalSales'])->name('total_sales');

// Razorpay Routes
// Route::get('payment', [RazorpayController::class, 'index']);
Route::post('/handlepayment', [RazorpayController::class, 'store']);
