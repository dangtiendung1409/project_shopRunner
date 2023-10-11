<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductFilter;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Size;
use App\Models\Material;
use App\Pipelines\ProductFilterPipeline;



use Illuminate\Support\Facades\DB;

class HomeController
{
    // giao diện khách hàng
    public function home(){
        return view("pages.customer.home");
    }
    public function categoryShop(Request $request){
        $colors = Color::all();
        $sizes = Size::all();
        $materials = Material::all();

        $query = Product::orderBy("created_at", "desc");
        $products = $query->paginate(12);
        return view("pages.customer.categoryShop", compact("products", "colors", "sizes", "materials"));
    }


    public function category(Category $category){
        $products = Product::where("category_id", $category-> id)
            ->orderBy("created_at", "desc")->paginate(12);
        $colors = Color::all();
        $sizes = Size::all();
        $materials = Material::all();
        return view("pages.customer.category", compact("products" ,"colors", "sizes", "materials"))->render();
    }
    public function details(Product $product)
    {
        // Lấy danh sách các biến thể của sản phẩm cụ thể với thông tin từ các bảng colors, sizes, và materials
        $variants = DB::table('product_variants')
            ->where('product_id', $product->id)
            ->join('colors', 'product_variants.color_id', '=', 'colors.id')
            ->join('sizes', 'product_variants.size_id', '=', 'sizes.id')
            ->join('materials', 'product_variants.material_id', '=', 'materials.id')
            ->select(
                'product_variants.*',
                'colors.name as color_name',
                'sizes.name as size_name',
                'materials.name as material_name'
            )
            ->distinct()
            ->get();
        $color = Color::all();
        $size = Size::all();
        $relate = Product::where("category_id", $product->category_id)
            ->where("id", "!=", $product->id)
            ->where("qty", ">" ,0)
            ->orderBy("created_at", "desc")
            ->limit(4)
            ->get();

        return view("pages.customer.shopDetails", compact("product", "variants", "relate" , "color", "size"));
    }

    public function cartShop(){
        return view("pages.customer.cartShop");
    }

    public function contactShop(){
       return view("pages.customer.contactShop");
    }
    public function aboutUs(){
       return view("pages.customer.aboutUs");
    }
    public function checkOut(){
        return view("pages.customer.checkOut");
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

    public function search(\Illuminate\Http\Request $req){
        $product = Product::where('name','like','%'.$req->key. '%')
                          ->orWhere('price',$req->key)
                          ->get();
        return view("pages.customer.search",compact('product'));
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
