<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\favoriteOrder;
use App\Models\Product;
use App\Mail\OrderMail;
use App\Events\CreateNewOrder;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Size;
use App\Models\Order;


use Illuminate\Support\Facades\DB;

class HomeController
{
    // giao diện khách hàng
    public function home(Request $request){

        $products = Product::all();

        return view("pages.customer.home",compact("products"));
    }
    public function search(\Illuminate\Http\Request $req){
        $product = Product::where('name','like','%'.$req->key. '%')
            ->orWhere('price',$req->key)
            ->get();
        return view("pages.customer.search",compact('product'));
    }

    public function categoryShop(Request $request){
        $colors = Color::all();
        $sizes = Size::all();

        $query = Product::orderBy("created_at", "desc");
        $products = $query->paginate(12);
        return view("pages.customer.categoryShop", compact("products", "colors", "sizes"));
    }


    public function category(Category $category){
        $products = Product::where("category_id", $category-> id)
            ->orderBy("created_at", "desc")->paginate(12);
        $colors = Color::all();
        $sizes = Size::all();

        return view("pages.customer.category", compact("products" ,"colors", "sizes"))->render();
    }
    public function details(Product $product)
    {
        // Lấy danh sách các biến thể của sản phẩm
        $variants = DB::table('product_variants')
            ->where('product_id', $product->id)
            ->join('colors', 'product_variants.color_id', '=', 'colors.id')
            ->join('sizes', 'product_variants.size_id', '=', 'sizes.id')
            ->select(
                'product_variants.*',
                'colors.name as color_name',
                'sizes.name as size_name',
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

        $review = Review::all();
        $relate = Product::where("category_id", $product->category_id)
            ->where("id", "!=", $product->id)
            ->where("qty", ">", 0)
            ->orderBy("created_at", "desc")
            ->limit(4)
            ->get();

        return view("pages.customer.shopDetails", compact("product", "variants", "relate", "colorAvailability", "sizeAvailability", "selectedColor", "selectedSize"));
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
        session(["cartShop" => $cartShop]);
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
    public function checkOut(){
        $cartShop = session()->has("cartShop")?session("cartShop"):[];
        $subtotal = 0;
        $can_checkout = true;
        foreach ($cartShop as $item){
            $subtotal += $item->price * $item->buy_qty;
            if($item->buy_qty > $item->qty)
                $can_checkout = false;
        }
        $total = $subtotal*1.1; // vat: 10%
        if(count($cartShop)==0 || !$can_checkout){
            return redirect()->to("cart");
        }
        return view("pages.customer.checkOut",compact("cartShop","subtotal","total"));
    }
//    public function placeOrder(Request $request){
//        $request->validate([
//            "full_name"=>"required|min:6",
//            "address"=>"required",
//            "tel"=> "required|min:9|max:11",
//            "email"=>"required",
//            "shipping_method"=>"required",
//            "payment_method"=>"required"
//        ],[
//            "required"=>"Vui lòng nhập thông tin."
//        ]);
//        // calculate
//        $cartShop = session()->has("cartShop")?session("cartShop"):[];
//        $subtotal = 0;
//        $product = new Product;
//        foreach ($cartShop as $item){
//            $subtotal += $item->price * $item->buy_qty;
//        }
//        $total = $subtotal*1.1; // vat: 10%
//        $order = Order::create([
//            "grand_total"=>$total,
//            "full_name"=>$request->get("full_name"),
//            "email"=>$request->get("email"),
//            "tel"=>$request->get("tel"),
//            "address"=>$request->get("address"),
//            "shipping_method"=>$request->get("shipping_method"),
//            "payment_method"=>$request->get("payment_method")
//        ]);
//        foreach ($cartShop as $item) {
//            // Lấy ID của màu và kích thước từ tên
//            $colorId = $product->getColorIdByName($item->color);
//            $sizeId = $product->getSizeIdByName($item->size);
//
//            // Lấy biến thể sản phẩm dựa trên màu (color) và kích thước (size)
//            $variant = DB::table("product_variants")
//                ->where('product_id', $item->id)
//                ->where('color_id', $colorId)
//                ->where('size_id', $sizeId)
//                ->first();
//
//            if ($variant) {
//                // Cập nhật số lượng biến thể (variants) đã chọn
//                DB::table("product_variants")
//                    ->where('product_id', $item->id)
//                    ->where('color_id', $colorId)
//                    ->where('size_id', $sizeId)
//                    ->decrement('quantity', $item->buy_qty);
//
//                // Cập nhật số lượng tổng của sản phẩm (tổng của các biến thể)
//                $totalQuantity = DB::table("product_variants")
//                    ->where('product_id', $item->id)
//                    ->sum('quantity');
//
//                DB::table("products")
//                    ->where('id', $item->id)
//                    ->update(['qty' => $totalQuantity]);
//            }
//
//            // Lưu thông tin đặt hàng vào bảng order_products
//            DB::table("order_products")->insert([
//                "order_id" => $order->id,
//                "product_id" => $item->id,
//                "color" => $item->color,
//                "size" => $item->size,
//                "qty" => $item->buy_qty,
//                "price" => $item->price
//            ]);
//
//
//    }
//        // clear cart
//        session()->forget("cartShop");
//        event(new CreateNewOrder($order));
//
//        return redirect()->to("/vnpay_payment");
//    }

    public function contactShop(){
       return view("pages.customer.contactShop");
    }
    public function aboutUs(){
       return view("pages.customer.aboutUs");
    }
    public function myOrder(){
        return view("pages.customer.myOrder");
    }
    public function changePassword(){
        return view("pages.customer.changePassword");
    }
    public function addToFavorite(Request $request)
    {
        // Lấy dữ liệu từ request
        $name = $request->input('name');
        $price = $request->input('price');
        $thumbnail = $request->input('thumbnail');

        // Kiểm tra xem sản phẩm đã tồn tại trong danh sách yêu thích hay chưa
        $existingProduct = FavoriteOrder::where('name', $name)->first();
        if ($existingProduct) {
            // Sản phẩm đã tồn tại, xử lý tùy ý (ví dụ: hiển thị thông báo lỗi)
            return redirect()->back()->with('error', 'Sản phẩm đã có trong danh sách yêu thích');
        }

        // Tạo đối tượng FavoriteOrder
        $favoriteOrder = new FavoriteOrder();
        $favoriteOrder->name = $name;
        $favoriteOrder->price = $price;
        $favoriteOrder->thumbnail = $thumbnail;

        // Lưu đối tượng vào cơ sở dữ liệu
        $favoriteOrder->save();

        // Chuyển hướng người dùng đến trang "Favorite Order"
        return redirect()->back()->with('success', 'Thêm sản phẩm vào danh sách yêu thích thành công');
    }
    public function removeFavorite(Request $request)
    {
        $productId = $request->query('product_id');
        $favoriteOrder = FavoriteOrder::find($productId);

        if (!$favoriteOrder) {
            return redirect()->back();
        }

        $favoriteOrder->delete();

        // Chuyển hướng người dùng đến trang "Favorite Order" với thông báo thành công
        return redirect()->back()->with('success', 'Removed from favorite orders successfully.');
    }
    public function clearFavorite()
    {
        // Xóa toàn bộ sản phẩm trong danh sách yêu thích (favoriteOrder)

        FavoriteOrder::truncate(); // Xóa toàn bộ dữ liệu trong bảng FavoriteProduct

        // Redirect hoặc trả về phản hồi thích hợp
        return redirect()->back()->with('success', 'Xóa toàn bộ yêu thích thành công');
    }

    public function favoriteOrder()
    {
        // Lấy danh sách các sản phẩm yêu thích từ cơ sở dữ liệu
        $favoriteProducts = FavoriteOrder::all();

        // Truyền danh sách sản phẩm yêu thích đến view "favoriteOrder"
        return view("pages.customer.favoriteOrder", compact('favoriteProducts'));
    }
    public function ThankYou(){
//        dd(session("cartShop"));
        return view("pages.customer.ThankYou");
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
