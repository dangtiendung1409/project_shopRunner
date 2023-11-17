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
            $query
            ->orWhereHas('product', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }
        return $query;
    }
    public function scopeFilterByEmail($query,$request){
        if($request->has("user_email")&& $request->get("user_email") != ""){
            $search = $request->get("user_email");
            $query->orWhereHas('user', function ($q) use ($search) {
                    $q->where('email', 'like', "%$search%");
                });
        }
        return $query;
    }

    public function scopeFilterByRating($query, $request)
    {
        if ($request->has("rating") && $request->get("rating") != 0) {
            $rating = $request->get("rating");
            $query->where("rating", "=", $rating);
        }
        return $query;
    }
}
