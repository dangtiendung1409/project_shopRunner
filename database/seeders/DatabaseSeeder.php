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


         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Brands::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Product::factory(592)->create();
        \App\Models\Review::factory(5)->create();


       \App\Models\Order::factory(10)->create();

         $orders = Order::all(); //select * from orders
        foreach ($orders as $order){
             $grand_total = 0;
            $product_count = random_int(1,5);
            $randoms =Product::all()->random($product_count);
               foreach ($randoms as $item){
                  $qty =random_int(1,10);
                   $grand_total += $qty* $item ->price ;
                   DB::table("order_products") -> insert([
                       "product_id" =>$item->id,
                       "order_id" =>$order->id,
                       "qty" => $qty,
                       "price" => $item -> price,
                   ]);
                }
                $order ->grand_total =$grand_total;
               $order ->save();
         }

    }
}

