<?php

namespace App\Http\Controllers;

use App\Models\favoriteOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class baoCaoDoanhThuController
{
    public function baoCaoDoanhThu() {
        // ô số liệu tổng hợp
        $totalEmployees = User::where('role', 'employee')->count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('grand_total');
        $totalCancelledOrders = Order::getTotalCancelledOrders();
        $outOfStockProductCount = Product::outOfStock()->count();

        // bảng sản phẩm đã hết
        $outOfStockProducts = Product::outOfStock()
            ->orderBy("id", "desc")
            ->paginate(20);

        // bảng sản phẩm bán chạy
        $bestSellingProducts = Product::withCount('orders')
            ->whereHas('orders', function ($query) {
                $query->where('status', '!=', Order::COMPLETE);
            })
            ->orderBy('orders_count', 'desc')
            ->take(200)
            ->get();

        // bảng sản phẩm yêu thích
        $mostFavoriteProducts = FavoriteOrder::select('product_id', DB::raw('COUNT(user_id) as favorite_count'))
            ->groupBy('product_id')
            ->orderByRaw('COUNT(user_id) DESC')
            ->paginate(200);

        $mostFavoriteProductDetails = [];

        foreach ($mostFavoriteProducts as $product) {
            $productDetail = Product::find($product->product_id);
            if ($productDetail) {
                $mostFavoriteProductDetails[] = $productDetail;
            }
        }

        // bảng tổng đơn hàng
        $orders = Order::select('id', 'full_name', 'grand_total')
            ->with('Products')
            ->get();

        $orderTotals = [];

        foreach ($orders as $order) {
            $orderTotal = [
                'order_id' => $order->id,
                'customer' => $order->full_name,
                'products' => $order->Products->pluck('name')->implode(', '),
                'total_quantity' => $order->Products->count(),
                'total_amount' => $order->getGrandTotal(),
            ];

            $orderTotals[] = $orderTotal;
        }


        // Truyền số liệu vào view và trả về view
        return view("admin.pages.baoCaoDoanhThu", [
            'totalEmployees' => $totalEmployees,
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'totalCancelledOrders' => $totalCancelledOrders,
            'outOfStockProductCount' => $outOfStockProductCount,
            'outOfStockProducts' => $outOfStockProducts,

            'mostFavoriteProductDetails' => $mostFavoriteProductDetails,
            'bestSellingProducts' => $bestSellingProducts,
            'orderTotals'=> $orderTotals

        ]);
    }
}
