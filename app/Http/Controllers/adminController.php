<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class adminController extends Controller
{

    public function qlNhanVien(){
        return view("admin.pages.qlNhanVien");
    }

    public function addNhanVien(){
        return view("admin.pages.addNhanVien");
    }

    public function qlThongTinKhuyenMai(){


        return view("admin.pages.qlThongTinKhuyenMai");
    }

    public function addThongTinKhuyenMai(Request $request){

        $applyFor = $request->input('apply_for');
        $searchText = $request->input('search_text');
        $results = [];

        if ($applyFor === 'product') {
            $results = Product::where('name', 'LIKE', '%' . $searchText . '%')->get();
        } elseif ($applyFor === 'category') {
            $results = Category::where('name', 'LIKE', '%' . $searchText . '%')->get();
        } elseif ($applyFor === 'category_single') {
            // Xử lý tìm kiếm cho loại khác nếu cần
        }

        return view("admin.pages.addThongTinKhuyenMai", ['results' => $results]);
    }
    public function qlKhachHang(){
        return view("admin.pages.qlKhachHang");
    }
    public function baoCaoDoanhThu(){
        return view("admin.pages.baoCaoDoanhThu");
    }
}
