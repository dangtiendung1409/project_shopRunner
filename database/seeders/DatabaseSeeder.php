<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


//         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//        \App\Models\Brands::factory(10)->create();
//        \App\Models\Category::factory(10)->create();
//        \App\Models\Product::factory(592)->create();


//     \App\Models\Color::factory(5)->create();
//        \App\Models\Material::factory(5)->create();
//      \App\Models\Size::factory(5)->create();

//        $products = DB::table('products')->get();
//
//        // Lặp qua danh sách sản phẩm và tạo ngẫu nhiên từ 1 đến 4 biến thể cho mỗi sản phẩm
//        foreach ($products as $product) {
//            $variantCount = random_int(2, 3);
//
//            for ($i = 0; $i < $variantCount; $i++) {
//                $color = DB::table('colors')->inRandomOrder()->first();
//                $size = DB::table('sizes')->inRandomOrder()->first();
//                $material = DB::table('materials')->inRandomOrder()->first();
//                $quantity = random_int(1, 20);
//
//                // Thêm biến thể vào bảng product_variants
//                DB::table('product_variants')->insert([
//                    'product_id' => $product->id,
//                    'color_id' => $color->id,
//                    'size_id' => $size->id,
//                    'material_id' => $material->id,
//                    'quantity' => $quantity,
//                ]);
//            }
//        }

//       \App\Models\Order::factory(10)->create();
//
//         $orders = Order::all(); //select * from orders
//        foreach ($orders as $order){
//             $grand_total = 0;
//            $product_count = random_int(1,5);
//            $randoms =Product::all()->random($product_count);
//               foreach ($randoms as $item){
//                  $qty =random_int(1,10);
//                   $grand_total += $qty* $item ->price ;
//                   DB::table("order_products") -> insert([
//                       "product_id" =>$item->id,
//                       "order_id" =>$order->id,
//                       "qty" => $qty,
//                       "price" => $item -> price,
//                   ]);
//                }
//                $order ->grand_total =$grand_total;
//               $order ->save();
//         }

//        // update  lại tổng số lượng mỗi 1 sản phẩm bảng product = tổng biến thể của 1 sản phẩm cộng lại của bảng product_variants
//        $products = Product::all();
//
//        foreach ($products as $product) {
//            $totalQuantity = $product->calculateTotalQuantity();
//            $product->update(['qty' => $totalQuantity]);
//        }
    }
}

