<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "full_name",
        "tel",
        "address",
        "grand_total",
        "shipping_method",
        "payment_method",
        "status",
        "note",
        "is_paid"
    ];
}
