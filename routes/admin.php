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
Route::get('/admin-bao-cao-doanh-thu', [\App\Http\Controllers\adminController::class,"baoCaoDoanhThu"]);

