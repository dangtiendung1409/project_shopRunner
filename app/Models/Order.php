<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        "user_id",
        "full_name",
        "tel",
        "address",
        "grand_total",
        "shipping_method",
        "payment_method",
        "status",
        "is_paid"
    ];

    const PENDING = 0; // chờ xác nhận
    const CONFIRMED = 1; // đã xác nhận
    const SHIPPING = 2; // đang giao hàng
    const SHIPPED = 3; // đã giao hàng
    const COMPLETE = 4; // hoàn thành
    const CANCEL = 5; // huỷ

    public function Products(){
        return $this->belongsToMany(Product::class,"order_products")->withPivot(["qty","price"]);
    }

    public function getGrandTotal(){
        return "$".number_format($this->grand_total,2);
    }
    public function getPaid(){
        return $this->is_paid?"<span class='btn btn-success'>Đã thanh toán</span>"
            :"<span class='btn btn-secondary'>Chưa thanh toán</span>";
    }
    public function getStatus(){
        switch ($this->status){
            case self::PENDING: return "<span class='text-secondary'>Chờ xác nhận</span>";
            case self::CONFIRMED: return "<span class='text-info'>Đã xác nhận</span>";
            case self::SHIPPING: return "<span class='text-warning'>Đang giao hàng</span>";
            case self::SHIPPED: return "<span class='text-primary'>Đã giao hàng</span>";
            case self::COMPLETE: return "<span class='text-success'>Hoàn thành</span>";
            case self::CANCEL: return "<span class='text-danger'>Huỷ</span>";
        }
    }
}
