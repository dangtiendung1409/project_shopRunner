<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function ratings(){
//        Seesion::put('pages', 'ratings');
        $ratings = Review::with(["user", "product"])->get()->toArray();
//        dd($ratings);
        return view("admin.pages.ratings", compact("ratings"));
    }
}
