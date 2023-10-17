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
        "price",
        "thumbnail",
        "qty",
        "description",
        "category_id"
    ];

    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function Orders(){
        return $this->belongsToMany(Order::class, "order_products");
    }


    // update lại tổng số lượng mỗi sản phẩm
    public function calculateTotalQuantity(): int
    {
        // Sử dụng truy vấn SQL để tính tổng số lượng của các biến thể của sản phẩm
        $totalQuantity = \DB::table('product_variants')
            ->where('product_id', $this->id)
            ->sum('quantity');

        return $totalQuantity;
    }
    public function getColorIdByName($colorName)
    {
        // Tìm id của màu dựa trên tên
        $color = Color::where('name', $colorName)->first();
        return $color ? $color->id : null;
    }

    public function getSizeIdByName($sizeName)
    {
        // Tìm id của kích thước dựa trên tên
        $size = Size::where('name', $sizeName)->first();
        return $size ? $size->id : null;
    }




}
