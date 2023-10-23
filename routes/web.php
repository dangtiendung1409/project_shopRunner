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
Route::get('/contact', [\App\Http\Controllers\HomeController::class,"contactShop"]);
Route::get('/about-us', [\App\Http\Controllers\HomeController::class,"aboutUs"]);

// category
Route::get('/category', [\App\Http\Controllers\HomeController::class,"categoryShop"]);
Route::get('/category/{category:slug}', [\App\Http\Controllers\HomeController::class,"category"]);

// details
Route::get('/details/{product:slug}', [\App\Http\Controllers\HomeController::class,"details"]);
Route::post('/create', [\App\Http\Controllers\HomeController::class,"create"]);


// cart
Route::get('/add-to-cart/{product}', [\App\Http\Controllers\HomeController::class,"addToCart"]);
Route::get('/delete-from-cart/{product}', [\App\Http\Controllers\HomeController::class, "deleteFromCart"]);
Route::post('/update-cart/{product}', [\App\Http\Controllers\HomeController::class, "updateCart"]);
Route::get('/clear-cart', [\App\Http\Controllers\HomeController::class, "clearCart"]);
Route::get('/cart', [\App\Http\Controllers\HomeController::class,"cartShop"]);

// check out
Route::get('/check-out', [\App\Http\Controllers\HomeController::class,"checkOut"]);
Route::post('/check-out', [\App\Http\Controllers\HomeController::class,"placeOrder"]);
Route::get('/paypal-success/{order}', [\App\Http\Controllers\HomeController::class,"paypalSuccess"]);
Route::get('/paypal-cancel/{order}', [\App\Http\Controllers\HomeController::class,"paypalCancel"]);
//Route::post('/payment', [\App\Http\Controllers\PaymentController::class,"create"]);
//Route::get('/return-vnpay',[\App\Http\Controllers\PaymentController::class,"return"]);

//Route::post('/check-out', [\App\Http\Controllers\HomeController::class,"placeOrder"]);

// user : account , trạng thái dơn hàng , danh sách sản phẩm yêu thích
Route::get('/my-order', [\App\Http\Controllers\HomeController::class,"myOrder"]);
Route::get('/change-password', [\App\Http\Controllers\HomeController::class,"changePassword"]);
Route::get('/add-to-favorite', [\App\Http\Controllers\HomeController::class,"addToFavorite"]);
Route::get('/remove-favorite', [\App\Http\Controllers\HomeController::class, "removeFavorite"]);
Route::get('/clear-favorite', [\App\Http\Controllers\HomeController::class, "clearFavorite"]);
Route::get('/favorite-order', [\App\Http\Controllers\HomeController::class,"favoriteOrder"]);

// thank you
Route::get('/thank-you/{order}', [\App\Http\Controllers\HomeController::class,"ThankYou"]);

// search product
Route::get('search-product', [\App\Http\Controllers\HomeController::class, 'search'])->name('search-product');



//  login

// login dành cho nhân viên và admin
Route::get('/login-quan-tri', [\App\Http\Controllers\HomeController::class,"loginQuanTri"]);

// login dành cho người dùng
Route::get('/login-user', [\App\Http\Controllers\HomeController::class,"loginUser"]);



Route::get('/admin-quan-ly-nhan-vien', [\App\Http\Controllers\adminController::class,"qlNhanVien"]);
Route::get('/admin-quan-ly-khach-hang', [\App\Http\Controllers\adminController::class,"qlKhachHang"]);
Route::get('/admin-quan-ly-đon-hang', [\App\Http\Controllers\OrderController::class,"qlDonHang"]);
Route::get('/admin-edit-đon-hang/{order}', [\App\Http\Controllers\OrderController::class,"editDonHang"]);
Route::put('/admin-edit-đon-hang/{order}', [\App\Http\Controllers\OrderController::class,"update"]);
Route::delete('/admin-delete-đon-hang/{order}', [\App\Http\Controllers\OrderController::class,"delete"]);
Route::get('/admin-quan-ly-san-pham', [\App\Http\Controllers\ProductController::class,"qlSanPham"]);
Route::get('/admin-add-san-pham', [\App\Http\Controllers\ProductController::class,"addSanPham"]);
Route::post("/admin-add-san-pham", [\App\Http\Controllers\ProductController::class, "store"]);
Route::get('/admin-edit-san-pham/{product}', [\App\Http\Controllers\ProductController::class,"editSanPham"]);
Route::put('/admin-edit-san-pham/{product}', [\App\Http\Controllers\ProductController::class,"update"]);
Route::delete("/admin-delete-san-pham/{product}", [\App\Http\Controllers\ProductController::class, "delete"]);

Route::get('/admin-add-nhan-vien', [\App\Http\Controllers\adminController::class,"addNhanVien"]);

Route::get('/admin-quan-ly-thong-tin-khuyen-mai', [\App\Http\Controllers\adminController::class,"qlThongTinKhuyenMai"]);
Route::get('/admin-add-thong-tin-khuyen-mai', [\App\Http\Controllers\adminController::class,"addThongTinKhuyenMai"]);

// giao diện nhân viên
Route::get('/nhan-vien-add-san-pham', [\App\Http\Controllers\NhanVienProductController::class,"AddSanPham"]);
Route::post('/nhan-vien-add-san-pham', [\App\Http\Controllers\NhanVienProductController::class,"store"]);
Route::get('/nhan-vien-quan-ly-san-pham', [\App\Http\Controllers\NhanVienProductController::class,"QuanLySanPham"]);
Route::get('/nhan-vien-edit-san-pham/{product}', [\App\Http\Controllers\NhanVienProductController::class,"editSanPham"]);
Route::put('/nhan-vien-edit-san-pham/{product}', [\App\Http\Controllers\NhanVienProductController::class,"update"]);
Route::delete('/nhan-vien-delete-san-pham/{product}', [\App\Http\Controllers\NhanVienProductController::class,"delete"]);

Route::get('/nhan-vien-quan-ly-đon-hang', [\App\Http\Controllers\NhanVienOrderController::class,"QuanLyDonHang"]);
Route::get('/nhan-vien-edit-đon-hang/{order}', [\App\Http\Controllers\NhanVienOrderController::class,"editDonHang"]);
Route::put('/nhan-vien-edit-đon-hang/{order}', [\App\Http\Controllers\NhanVienOrderController::class,"update"]);
Route::delete('/nhan-vien-delete-đon-hang/{order}', [\App\Http\Controllers\NhanVienOrderController::class,"delete"]);

Route::get('/nhan-vien-quan-ly-khach-hang', [\App\Http\Controllers\NhanVienController::class,"QuanLyKhachHang"]);
Route::get('/nhan-vien-quan-ly-thong-tin-khuyen-mai', [\App\Http\Controllers\NhanVienController::class,"QuanLyThongTinKhuyenMai"]);
Route::get('/nhan-vien-add-thong-tin-khuyen-mai', [\App\Http\Controllers\NhanVienController::class,"AddThongTinKhuyenMai"]);

// rating
Route::get('/admin-rating', [\App\Http\Controllers\RatingController::class,"ratings"]);

