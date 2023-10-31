<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function qlDonHang(Request $request){
        $grand_total = $request->get("grand_total");
        $shipping_method = $request->get("shipping_method");
        $payment_method = $request->get("payment_method");
        $paid = $request->get("paid");
        $status = $request->get("rate");

        $orders = Order::Search($request)->FilterByGrandTotal($request)->FilterByShippingMethod($request)->FilterByStatus($request)->FilterByPaymentMethod($request)->FilterByPaid($request)->orderBy("id","desc")->paginate(20);
        $categories = Category::all();
        return view("admin.pages.Order.qlDonHang",["orders"=>$orders
            ,            'categories'=>$categories

        ]);
    }

    public function editDonHang(Order $order){
        return view("admin.pages.Order.editDonHang", compact('order'));
    }

    public function update(Order $order,Request $request){
        $request->validate([
            "full_name"=>"required|min:6",
            "grand_total"=>"required|numeric|min:0",
            "status"=>"required|numeric|min:0|max:5",
            "tel"=>"required|min:9|max:11",
        ]);
        try {
            $order->update([
                'user_id' => $request->get('user_id'),
                'full_name' => $request->get('full_name'),
                'tel' => $request->get('tel'),
                'address' => $request->get('address'),
                'grand_total' => $request->get('grand_total'),
                'shipping_method' => $request->get('shipping_method'),
                'payment_method' => $request->get('payment_method'),
                'status' => $request->get('status'),
                'note' => $request->get('note'),
                'is_paid' => $request->get('is_paid'),
            ]);



            return redirect()->to("admin/admin-quan-ly-đon-hang")->with("success","Successfully");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete(Order $order){
        try {
            DB::table('order_products')->where('order_id', $order->id)->delete();
            $order->delete();
            return redirect()->to("admin/admin-quan-ly-đon-hang")->with("success","Successfully");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
