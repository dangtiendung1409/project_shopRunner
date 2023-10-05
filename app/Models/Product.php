<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        "name",
        "slug",
        "color",
//        "size",
        "price",
        "thumbnail",
        "qty",
//        "status",
        "description",
        "category_id"
    ];
    public function Orders(){
        return $this->belongsToMany(Order::class, "order_product");
    }
}
