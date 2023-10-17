<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favoriteOrder extends Model
{
    use HasFactory;
    protected $table = 'favorite_orders';
    protected $fillable = [
        'name',
        'price',
        'thumbnail'
    ];
}
