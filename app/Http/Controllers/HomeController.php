<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductFilter;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Size;
use App\Models\Material;
use App\Pipelines\ProductFilterPipeline;



use Illuminate\Support\Facades\DB;

class HomeController
{
    // giao diện khách hàng
    public function home(Request $request){
        $products = Product::all();
        return view("pages.customer.home",compact("products"));
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
        // Lấy danh sách các biến thể của sản phẩm
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

        $colorAvailability = [];
        $sizeAvailability = [];

        foreach ($variants as $variant) {
            $color = $variant->color_name;
            $size = $variant->size_name;

            $colorAvailability[$color][] = $size;
            $sizeAvailability[$size][] = $color;
        }

        // Duyệt các biến thể và lấy thông tin màu và kích thước đã chọn (nếu có)
        $selectedColor = request('color');
        $selectedSize = request('size');

        $reviews = Review::orderBy("id", "desc")->paginate(10);

        $relate = Product::where("category_id", $product->category_id)
            ->where("id", "!=", $product->id)
            ->where("qty", ">", 0)
            ->orderBy("created_at", "desc")
            ->limit(4)
            ->get();

        return view("pages.customer.shopDetails", compact("product", "variants", "relate", "colorAvailability", "sizeAvailability", "selectedColor", "selectedSize", "reviews"));
    }

    public function store(Request $request){
        $reviews = Review::details([
            "full_name"=>$request->get("full_name"),
            "message"=>$request->get("message"),
        ]);
        $reviews->save();
        return redirect('/details/{product:slug}');
    }

    public function addToCart(Product $product, Request $request){
        $buy_qty = $request->get("buy_qty");
        $size = $request->get("size");
        $color = $request->get("color");


        if (empty($size) || empty($color)) {
            return redirect()->back()->withInput()->with("error", "Vui lòng chọn kích thước và màu sắc trước khi thêm vào giỏ hàng.");
        }
        $cartShop = session()->has("cartShop") ? session("cartShop") : [];

        foreach ($cartShop as $item) {
            if ($item->id == $product->id && $item->color == $color && $item->size == $size) {
                $item->buy_qty += $buy_qty;
                session(["cartShop" => $cartShop]);
                return redirect()->back()->with("success", "Đã cập nhật số lượng trong giỏ hàng.");
            }
        }

        // Tạo một mục sản phẩm mới với màu và kích thước được chọn
        $product->buy_qty = $buy_qty;
        $product->color = $color;
        $product->size = $size;
        $cartShop[] = $product;
        session(["cartShop" => $cartShop]);

        return redirect()->back()->with("success", "Đã thêm sản phẩm vào giỏ hàng.");
    }

    public function cartShop()
    {
        $cartShop = session()->has("cartShop")?session("cartShop"):[];
        $subtotal = 0;
        $can_checkout = true;
        foreach ($cartShop as $item){
            $subtotal += $item->price * $item->buy_qty;
            if($item->buy_qty > $item->qty)
                $can_checkout = false;
        }
        $total = $subtotal*1.1; // vat: 10%
        return view('pages.customer.cartShop', compact('cartShop', 'subtotal', 'total', 'can_checkout'));
    }
    public function deleteFromCart(Product $product){
        $cartShop = session()->has("cartShop") ? session("cartShop") : [];
        $cartShop = array_filter($cartShop, function ($item) use ($product) {
            return $item->id != $product->id;
        });
        session()->put("cartShop", $cartShop);
        return redirect()->back()->with("success", "Đã xóa sản phẩm khỏi giỏ hàng");


    }
    public function updateCart(Product $product, Request $request)
    {
        $buy_qty = $request->get("buy_qty");
        $cartShop = session()->has("cartShop") ? session("cartShop") : [];

        foreach ($cartShop as $item) {
            if ($item->id == $product->id) {
                $item->buy_qty = $buy_qty;
                break;
            }
        }

        session(["cartShop" => $cartShop]);
        return redirect()->back()->with("success", "Đã cập nhật giỏ hàng");
    }
    public function clearCart(){
        session()->forget("cartShop");
        return redirect()->back()->with("success", "Đã xóa tất cả sản phẩm khỏi giỏ hàng");
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
