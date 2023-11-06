<?php
Route::get('/admin-quan-ly-nhan-vien', [\App\Http\Controllers\adminController::class,"qlNhanVien"]);
Route::get('/admin-edit-nhan-vien/{user}', [\App\Http\Controllers\adminController::class,"editNhanVien"]);
Route::put('/admin-edit-nhan-vien/{user}', [\App\Http\Controllers\adminController::class,"update"]);
Route::get('/admin-add-nhan-vien', [\App\Http\Controllers\adminController::class,"addNhanVien"]);
Route::post('/admin-add-nhan-vien', [\App\Http\Controllers\adminController::class,"store"]);
Route::delete('/admin-delete-nhan-vien/{user}', [\App\Http\Controllers\adminController::class,"delete"]);

Route::get('/admin-quan-ly-khach-hang', [\App\Http\Controllers\adminController::class,"qlKhachHang"]);
Route::get('/admin-quan-ly-đon-hang', [\App\Http\Controllers\OrderController::class,"qlDonHang"]);
Route::get('/admin-detail/{order}', [\App\Http\Controllers\OrderController::class, "detail"]);
Route::post('update-order-status/{order}', [\App\Http\Controllers\OrderController::class, "updateOrderStatus"])->name('update_order_status');
Route::post('update-order-status-cancel/{order}', [\App\Http\Controllers\OrderController::class, "updateOrderStatusCancel"])->name('update_order_status_cancel');


Route::get('/admin-quan-ly-san-pham', [\App\Http\Controllers\ProductController::class,"qlSanPham"]);
Route::get('/admin-add-san-pham', [\App\Http\Controllers\ProductController::class,"addSanPham"]);
Route::post("/admin-add-san-pham", [\App\Http\Controllers\ProductController::class, "store"]);
Route::get('/admin-edit-san-pham/{product}', [\App\Http\Controllers\ProductController::class,"editSanPham"]);
Route::put('/admin-edit-san-pham/{product}', [\App\Http\Controllers\ProductController::class,"update"]);
Route::delete("/admin-delete-san-pham/{product}", [\App\Http\Controllers\ProductController::class, "delete"]);

Route::get('/admin-bao-cao-doanh-thu', [\App\Http\Controllers\baoCaoDoanhThuController::class, "baoCaoDoanhThu"]);
Route::get('/admin-quan-ly-thong-tin-khuyen-mai', [\App\Http\Controllers\adminController::class,"qlThongTinKhuyenMai"]);
Route::get('/admin-add-thong-tin-khuyen-mai', [\App\Http\Controllers\adminController::class,"addThongTinKhuyenMai"]);


