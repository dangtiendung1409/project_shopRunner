<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\favoriteOrder;
use App\Models\Product;
use App\Mail\OrderMail;
use App\Events\CreateNewOrder;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Order;


use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

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


        $query = Product::orderBy("created_at", "desc");
        $products = $query->paginate(12);
        return view("pages.customer.categoryShop", compact("products"));
    }


    public function category(Category $category)
    {
        $products = Product::where("category_id", $category->id)
            ->orderBy("created_at", "desc")->paginate(12);
        return view("pages.customer.category", compact("products" ))->render();
    }
    public function details(Product $product)
    {
        $relate = Product::where("category_id", $product->category_id)
            ->where("id", "!=", $product->id)
            ->where("qty", ">", 0)
            ->orderBy("created_at", "desc")
            ->limit(4)
            ->get();

        return view("pages.customer.shopDetails", compact("product",  "relate"));
    }

//    public function create(){
//        return view("pages.customer.shopDetails");
//    }
//    public function store(Request $request){
//        Product::create([
//            "full_name" =>$request->get("name"),
//            "message"=>$request->get("message"),
//        ]);
//        redirect()->to("");
//    }

    public function addToCart(Product $product, Request $request){
        $buy_qty = $request->get("buy_qty");
        $cartShop = session()->has("cartShop") ? session("cartShop") : [];
        foreach ($cartShop as $item){
            if($item->id == $product->id){
                $item->buy_qty = $item->buy_qty + $buy_qty;
                session(["cartShop"=>$cartShop]);
                return redirect()->back()->with("success","Đã thêm sản phẩm vào giỏ hàng");
            }
        }
        $product->buy_qty = $buy_qty;
        $cartShop[] = $product;
        session(["cartShop"=>$cartShop]);
        return redirect()->back()->with("success","Đã thêm sản phẩm vào giỏ hàng");
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
    public function placeOrder(Request $request){
        $request->validate([
            "full_name"=>"required|min:6",
            "address"=>"required",
            "tel"=> "required|min:9|max:11",
            "email"=>"required",
            "shipping_method"=>"required",
            "payment_method"=>"required"
        ],[
            "required"=>"Vui lòng nhập thông tin."
        ]);
        // calculate
        $cartShop = session()->has("cartShop")?session("cartShop"):[];
        $subtotal = 0;
        foreach ($cartShop as $item){
            $subtotal += $item->price * $item->buy_qty;
        }
        $total = $subtotal*1.1; // vat: 10%
        $order = Order::create([
            "grand_total"=>$total,
            "full_name"=>$request->get("full_name"),
            "email"=>$request->get("email"),
            "tel"=>$request->get("tel"),
            "address"=>$request->get("address"),
            "shipping_method"=>$request->get("shipping_method"),
            "payment_method"=>$request->get("payment_method")
        ]);
        foreach ($cartShop as $item){
            DB::table("order_products")->insert([
                "order_id"=>$order->id,
                "product_id"=>$item->id,
                "qty"=>$item->buy_qty,
                "price"=>$item->price
            ]);
            $product = Product::find($item->id);
            $product->update(["qty"=>$product->qty- $item->buy_qty]);
        }
        // clear cart
        session()->forget("cartShop");
        event(new CreateNewOrder($order));

        // thanh toan paypal
        if($order->payment_method == "Paypal"){
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => url("paypal-success",['order'=>$order]),
                    "cancel_url" => url("paypal-cancel",['order'=>$order]),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => number_format($order->grand_total,2,".","") // 1234.45
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

                return redirect()
                    ->back()
                    ->with('error', 'Something went wrong.');

            } else {
                return redirect()
                    ->back()
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        }
        return redirect()->to("thank-you/$order->id");
    }

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
    public function ThankYou(Order $order){
//        dd(session("cartShop"));
        return view("pages.customer.ThankYou",compact("order"));
    }

    public function paypalSuccess(Order $order){
        $order->update([
            "is_paid"=>true,
            "status"=> Order::CONFIRMED
        ]);// cập nhật trạng thái đã trả tiền

        return redirect()->to("thank-you/$order->id");
    }
    public function paypalCancel(Order $order){
        return redirect()->to("thank-you/$order->id");
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
