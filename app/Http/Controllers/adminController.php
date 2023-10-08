<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{

    public function qlNhanVien(){
        return view("admin.pages.qlNhanVien");
    }
    //
    public function qlSanPham(){
        return view("admin.pages.qlSanPham");
    }

    public function qlDonHang(){
        return view("admin.pages.qlDonHang");
    }

    public function addNhanVien(){
        return view("admin.pages.addNhanVien");
    }

    public function addSanPham(){
        return view("admin.pages.addSanPham");
    }

    public function qlThongTinKhuyenMai(){
        return view("admin.pages.qlThongTinKhuyenMai");
    }

    public function addThongTinKhuyenMai(){
        return view("admin.pages.addThongTinKhuyenMai");
    }
}
