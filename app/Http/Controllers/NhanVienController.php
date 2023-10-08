<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    public function AddSanPham(){
        return view("NhanVien.pages.addSanPham");
    }
    //
    public function QuanLyDonHang(){
        return view("NhanVien.pages.qlDonHang");
    }

    public function QuanLySanPham(){
        return view("NhanVien.pages.qlSanPham");
    }

    public function QuanLyThongTinKhuyenMai(){
        return view("NhanVien.pages.qlThongTinKhuyenMai");
    }

    public function AddThongTinKhuyenMai(){
        return view("NhanVien.pages.addThongTinKhuyenMai");
    }
}
