<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Session;
use Auth;

class RatingController extends Controller
{
    public function ratings(){
//        Seesion::put('pages', 'ratings');
        $ratings = Review::with(["user", "product"])->get()->toArray();
//        dd($ratings);
        return view("admin.pages.ratings", compact("ratings"));
    }

    public function addRating(Request $request){
        if ($request->isMethod('post')){
            $data = $request->all();
//            echo "<pre>"; print_r($data); die();
        }
        if (!Auth::check()){
            $message = "Login to rate this product!!!";
            Session::flash('error', $message);
            return redirect()->back();
        }

        if (!isset($data['rating'])){
            $message = "You need to rate the Product";
            Session::flash('error', $message);
            return redirect()->back();
        }

        $ratingCount = Review::where(['user_id'=>Auth::user()->id, 'product_id'=>$data['product_id']])->count();
        if ($ratingCount>0){
            $message = "Your rating already exists for this product";
            Session::flash('error', $message);
            return redirect()->back();
        } else{
            $rating = new Review;
            $rating->user_id = Auth::user()->id;
            $rating->product_id = $data['product_id'];
            $rating->message = $data['message'];
            $rating->rating = $data['rating'];
            $rating->save();
            $message = "Thanks for rating this product!!";
            Session::flash('success', $message);
            return redirect()->back();
        }
    }
}
