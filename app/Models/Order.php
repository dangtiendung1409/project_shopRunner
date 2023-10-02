<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
//        "user_id",
//        "full_name",
////        'email',
//        "tel",
//        "address",
//        "grand_total",
//        "shipping_method",
//        "payment_method",
//        "status",
////        "note"

        "grand_total",
        "status",
        "user_id",
        "full_name",
        "tel",
        "address",
        "shipping_method",
        "payment_method",
        "is_paid",
    ];
}
