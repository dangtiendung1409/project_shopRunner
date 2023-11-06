<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class adminController extends Controller
{

    public function qlNhanVien(){
        $user =User::where('role', 'EMPLOYEE')->get();
        return view("admin.pages.qlNhanVien",compact("user"));
    }

    public function addNhanVien(){

        return view("admin.pages.addNhanVien");
    }

    public function editNhanVien(User $user){

        return view("admin.pages.editNhanVien", compact("user"));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|min:6',
            'email' => 'required|email|unique:users', // Giả sử tên bảng của bạn là 'users'
            'tel' => 'required|string',
            'address' => 'required|string',
            'password' => 'required|string|min:8', // Điều chỉnh theo cần thiết
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ví dụ kiểm tra hình ảnh
        ]);


        try {
            $thumbnail = null;

            // Xử lý upload file
            if ($request->hasFile("thumbnail")) {
                $path = public_path("uploads");
                $file = $request->file("thumbnail");
                $file_name = Str::random(5) . time() . Str::random(5) . "." . $file->getClientOriginalExtension();
                $file->move($path, $file_name);
                $thumbnail = "/uploads/" . $file_name;
            }
            User::create([
                "name" => $request->get("name"),
                "thumbnail" => $thumbnail,
                "address" => $request->get("address"), // Sửa lỗi tại đây
                "tel" => $request->get("tel"), // Sửa lỗi tại đây
                "email" => $request->get("email"),
                "password" => Hash::make($request->get("password")),

                "role"=>"EMPLOYEE",
            ]);

            return redirect()->to("admin/admin-quan-ly-nhan-vien")->with("success","Successfully");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function update(User $user,Request $request){
        $request->validate([
            'name' => 'required|string|min:6',
            'email' => 'required|email',
            'tel' => 'required|string',
            'address' => 'required|string',
        ]);

        try {
            $thumbnail = $user->thumbnail;
            // xu ly upload file
            if($request->hasFile("thumbnail")){
                $path = public_path("uploads");
                $file = $request->file("thumbnail");
                $file_name = Str::random(5).time().Str::random(5).".".$file->getClientOriginalExtension();
                $file->move($path,$file_name);
                $thumbnail = "/uploads/".$file_name;
            }
            $user->update([
                "name" => $request->get("name"),
                "thumbnail" => $thumbnail,
                "address" => $request->get("address"), // Sửa lỗi tại đây
                "tel" => $request->get("tel"), // Sửa lỗi tại đây
                "email" => $request->get("email"),
            ]);

            return redirect()->to("admin/admin-quan-ly-nhan-vien")->with("success","Successfully");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete(User $user){

        try {
            $user->delete();

            return redirect()->to("admin/admin-quan-ly-nhan-vien")->with("success", "Xóa sản phẩm thành công");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
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
        $user = User::whereNull('role')->get();
        return view("admin.pages.qlKhachHang", compact("user"));
    }


}
