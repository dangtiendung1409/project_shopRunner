<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = "reviews";
    protected $fillable = [
        "user_id",
        "product_id",
        "rating",
        "message",
        "status"
    ];

    public function User(){
        return $this->belongsTo(User::class, "user_id");
    }
    public function Product(){
        return $this->belongsTo(Product::class, "product_id");
    }
    public function scopeSearch($query,$request){
        if($request->has("search")&& $request->get("search") != ""){
            $search = $request->get("search");
            $query->where("name","like","%$search%")
                ->orWhere("description","like","%$search%");
        }
        return $query;
    }

    public function scopeFilterByRating($query, $request)
    {
        if ($request->has("rating") && $request->get("rating") != 0) {
            $rating = $request->get("rating");
            $query->where("rating", ">=", $rating);
        }
        return $query;
    }
}
