<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewProduct extends Controller
{
//    public function listView(){
//        $products = Product::orderBy("id","desc")->paginate(5);
//        return view("pages.customer.shopDetails" , compact("products"));
//    }
//    public function create(){
//        return view("pages.customer.shopDetails");
//    }
//    public function store(Request $request){
//        try {
//            Product::create([
//                "name"=>$request->get("name"),
//                "email"=>$request->get("email"),
//                "tel"=>$request->get("tel"),
//                "message" => $request->get("message"),
////                "rating" => $request->get("rating"),
//            ]);
//            return redirect()->to("/details/{product:slug}")->with("success","Successfully");
//
//        }catch (\Exception $e){
//            return redirect()->back()->withErrors($e->getMessage());
//        }
//    }
}
