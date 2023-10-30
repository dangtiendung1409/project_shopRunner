<?php
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
