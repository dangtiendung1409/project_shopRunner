<?php

namespace App\Http\Controllers;

use App\Models\favoriteOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class baoCaoDoanhThuController
{
    public function revenueChart(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $monthLabels = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];

        $query = Order::selectRaw('MONTH(updated_at) AS month, COUNT(*) AS products_sold, SUM(grand_total) AS total_revenue')
            ->groupBy('month')
            ->orderBy('month')
            ->where('status', '4');

        if ($request->has('year')) {
            $query->whereYear('updated_at', $year);
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereBetween('updated_at', [$startDate, $endDate]);
        }

        $data = $query->get();

        $productsSoldByMonth = $data->pluck('products_sold', 'month')->toArray();
        $revenueByMonth = $data->pluck('total_revenue', 'month')->toArray();


        $productsSold = [];


        foreach (range(1, 12) as $month) {
            $productsSold[] = $productsSoldByMonth[$month] ?? 0;
            $revenue[] = $revenueByMonth[$month] ?? 0;

        }

        return response()->json([
            'labels' => $monthLabels,
            'productsSold' => $productsSold,
            'revenue' => $revenue,


        ]);
    }

    public function baoCaoDoanhThu() {
        // ô số liệu tổng hợp
        $totalEmployees = User::where('role', 'employee')->count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::where('status', '4')->sum('grand_total');
        $totalCancelledOrders = Order::getTotalCancelledOrders();
        $outOfStockProductCount = Product::outOfStock()->count();

        // bảng sản phẩm đã hết
        $outOfStockProducts = Product::outOfStock()
            ->orderBy("id", "desc")
            ->paginate(10);

        // bảng sản phẩm bán chạy
        $bestSellingProducts = Product::withCount('orders')
            ->whereHas('orders', function ($query) {
                $query->where('status', '!=', Order::COMPLETE);
            })
            ->orderBy('orders_count', 'desc')
            ->take(50)
            ->paginate(10);


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
            ->paginate(10);


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
            'mostFavoriteProducts' => $mostFavoriteProducts,

            'bestSellingProducts' => $bestSellingProducts,
            'orderTotals'=> $orderTotals,
            'orders' => $orders

        ]);
    }
}


