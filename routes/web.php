<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Giao diện người dùng
Route::get('/', [\App\Http\Controllers\HomeController::class,"home"]);
Route::get('/category', [\App\Http\Controllers\HomeController::class,"categoryShop"]);
Route::get('/category/{category:slug}', [\App\Http\Controllers\HomeController::class,"category"]);
Route::get('/details/{product:slug}', [\App\Http\Controllers\HomeController::class,"details"]);
Route::get('/cart', [\App\Http\Controllers\HomeController::class,"cartShop"]);
Route::get('/contact', [\App\Http\Controllers\HomeController::class,"contactShop"]);
Route::get('/about-us', [\App\Http\Controllers\HomeController::class,"aboutUs"]);
Route::get('/check-out', [\App\Http\Controllers\HomeController::class,"checkOut"]);
Route::get('/my-order', [\App\Http\Controllers\HomeController::class,"myOrder"]);
Route::get('/change-password', [\App\Http\Controllers\HomeController::class,"changePassword"]);
Route::get('/favorite-order', [\App\Http\Controllers\HomeController::class,"favoriteOrder"]);
Route::get('/thank-you', [\App\Http\Controllers\HomeController::class,"ThankYou"]);




// giao diện admin
Route::get('/admin-quan-ly-nhan-vien', [\App\Http\Controllers\HomeController::class,"qlNhanVien"]);
Route::get('/admin-quan-ly-khach-hang', [\App\Http\Controllers\HomeController::class,"qlKhachHang"]);
Route::get('/admin-quan-ly-đon-hang', [\App\Http\Controllers\HomeController::class,"qlDonHang"]);
Route::get('/admin-quan-ly-san-pham', [\App\Http\Controllers\HomeController::class,"qlSanPham"]);
Route::get('/admin-quan-ly-thong-tin-khuyen-mai', [\App\Http\Controllers\HomeController::class,"qlThongTinKhuyenMai"]);


// giao diện nhân viên
Route::get('/nhan-vien-quan-ly-khach-hang', [\App\Http\Controllers\HomeController::class,"QuanLyKhachHang"]);
Route::get('/nhan-vien-quan-ly-đon-hang', [\App\Http\Controllers\HomeController::class,"QuanLyDonHang"]);
Route::get('/nhan-vien-quan-ly-san-pham', [\App\Http\Controllers\HomeController::class,"QuanLySanPham"]);
Route::get('/nhan-vien-quan-ly-thong-tin-khuyen-mai', [\App\Http\Controllers\HomeController::class,"QuanLyThongTinKhuyenMai"]);

// login dành cho nhân viên và admin
Route::get('/login-quan-tri', [\App\Http\Controllers\HomeController::class,"loginQuanTri"]);

// login dành cho người dùng
Route::get('/login-user', [\App\Http\Controllers\HomeController::class,"loginUser"]);
