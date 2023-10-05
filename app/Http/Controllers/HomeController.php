<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController
{
    // giao diện khách hàng
    public function home(){
        return view("pages.customer.home");
    }
    public function categoryShop(){
        $products = Product::orderBy("created_at", "desc")->paginate(18);
        return view("pages.customer.CategoryShop", compact("products"));
    }
    public function category(Category $category){
        $products = Product::where("category_id", $category-> id)
            ->orderBy("created_at", "desc")->paginate(18);
        return view("pages.customer.category", compact("products"));
    }
    public function contactShop(){
       return view("pages.customer.contactShop");
    }
    public function aboutUs(){
       return view("pages.customer.aboutUs");
    }
    public function cartShop(){
        return view("pages.customer.cartShop");
    }
    public function checkOut(){
        return view("pages.customer.checkOut");
    }
    public function shopDetails(){
        return view("pages.customer.shopDetails");
    }
    public function myOrder(){
        return view("pages.customer.myOrder");
    }
    public function changePassword(){
        return view("pages.customer.changePassword");
    }
    public function favoriteOrder(){
        return view("pages.customer.favoriteOrder");
    }
    public function ThankYou(){
        return view("pages.customer.ThankYou");
    }


    // giao diện admin
    public function qlNhanVien(){
        return view("pages.admin.qlNhanVien");
    }
    public function qlKhachHang(){
        return view("pages.admin.qlKhachHang");
    }
    public function qlDonHang(){
        return view("pages.admin.qlDonHang");
    }
    public function qlSanPham(){
        return view("pages.admin.qlSanPham");
    }
    public function qlThongTinKhuyenMai(){
        return view("pages.admin.qlThongTinKhuyenMai");
    }

    //giao diện nhân viên
    public function QuanLyKhachHang(){
        return view("pages.nhanvien.QuanLyKhachHang");
    }
    public function QuanLyDonHang(){
        return view("pages.nhanvien.QuanLyDonHang");
    }
    public function QuanLySanPham(){
        return view("pages.nhanvien.QuanLySanPham");
    }
    public function QuanLyThongTinKhuyenMai(){
        return view("pages.nhanvien.QuanLyThongTinKhuyenMai");
    }

  // login dành cho admin và nhân viên
    public function loginQuanTri(){
        return view("pages.login.loginQuanTri");
    }
    // login dành cho người dùng
    public function loginUser(){
        return view("pages.loginUser.loginUser");
    }
}
