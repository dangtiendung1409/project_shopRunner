@extends("admin.layouts.app")
@section("main")

    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="app-title">
                    <ul class="app-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><b>Báo cáo doanh thu </b></a></li>
                    </ul>
                    <div id="clock"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class='icon  bx bxs-user fa-3x'></i>
                    <div class="info">
                        <h4>Tổng Nhân viên</h4>
                        <p><b>{{ $totalEmployees }} nhân viên</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon"><i class='icon bx bxs-purchase-tag-alt fa-3x'></i>
                    <div class="info">
                        <h4>Tổng sản phẩm</h4>
                        <p><b>{{ $totalProducts }} sản phẩm</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-shopping-bag-alt'></i>
                    <div class="info">
                        <h4>Tổng đơn hàng</h4>
                        <p><b>{{ $totalOrders }} đơn hàng</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart'></i>
                    <div class="info">
                        <h4>Tổng thu nhập</h4>
                        <p><b>${{ number_format($totalRevenue, 2) }}</b></p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-tag-x'></i>
                    <div class="info">
                        <h4>Hết hàng</h4>
                        <p><b>{{ $outOfStockProductCount }} sản phẩm</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon"><i class='icon fa-3x bx bxs-receipt'></i>
                    <div class="info">
                        <h4>Đơn hàng hủy</h4>
                        <p><b>{{ $totalCancelledOrders }} đơn hàng</b></p>
                    </div>
                </div>
            </div>
        </div>

        <!--thống kê -->
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">THỐNG KÊ ĐƠN HÀNG</h3>
                    <form autocomplete="off" class="input-row">

                        <div class="input-col">
                            <p class="input-label">Từ ngày:</p>
                            <input type="text" id="datepicker" class="form-control">
                            <input style="margin-top: 15px" type="button" id="btn-dashboard-filter"
                                   class="btn btn-primary btn-sm" value="Lọc kết quả">
                        </div>
                        <div class="input-col">
                            <p class="input-label">Đến ngày:</p>
                            <input type="text" id="datepicker2" class="form-control">
                        </div>
                        <div class="input-col">
                            <p class="input-label">Lọc theo:</p>
                            <select id="yearSelect" onchange="changeYear(this.value)"
                                    class="dashboard-filter form-control">
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023" selected>2023</option>
                            </select>
                        </div>
                    </form>
                    <div class="col-md-12">
                        <canvas id="productSoldChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tổng đơn hàng -->
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h3 class="tile-title">TỔNG ĐƠN HÀNG</h3>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTableOrder">
                            <thead>
                            <tr>
                                <th>ID đơn hàng</th>
                                <th>Khách hàng</th>
                                <th>Đơn hàng</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orderTotals as $orderTotal)
                                <tr>
                                    <td>{{ $orderTotal['order_id'] }}</td>
                                    <td>{{ $orderTotal['customer'] }}</td>
                                    <td>{{ $orderTotal['products'] }}</td>
                                    <td>{{ $orderTotal['total_quantity'] }}</td>
                                    <td>{{ $orderTotal['total_amount'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $orders->links("pagination::bootstrap-4") !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h3 class="tile-title">ĐƠN HÀNG CHƯA ĐƯỢC XỬ LÝ </h3>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTableOrder">
                            <thead>
                            <tr>
                                <th>ID đơn hàng</th>
                                <th>Tên Khách hàng</th>
                                <th>Email Khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pendingOrders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->full_name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->tel }}</td>
                                    <td>{{ $order->getGrandTotal() }}</td>
                                    <td>{!! $order->getStatus() !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $pendingOrders->links("pagination::bootstrap-4") !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- Sản phẩm yêu thích nhất -->
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h3 class="tile-title">SẢN PHẨM ĐƯỢC YÊU THÍCH NHẤT</h3>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTableFavorite">
                            <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá tiền</th>
                                <th>Danh mục</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($mostFavoriteProductDetails as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>

                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->category->name }}</td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Không có sản phẩm được yêu thích nào.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {!! $mostFavoriteProducts->links("pagination::bootstrap-4") !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Số sao trung bình cao nhất  -->
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h3 class="tile-title">SẢN PHẨM ĐƯỢC CÓ SỐ SAO TRUNG BÌNH CAO NHẤT </h3>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTableFavorite">
                            <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá tiền</th>
                                <th>Danh mục</th>
                                <th>Số sao trung bình</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($productsFromReviews as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ $product->thumbnail }}" style="width: 100px; height: auto;" alt="">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ number_format($product->averageRating(), 1) }} </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Không có sản phẩm từ các review.</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                        {!! $productsFromReviews->links("pagination::bootstrap-4") !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Sản phẩm bán chạy -->
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h3 class="tile-title">SẢN PHẨM BÁN CHẠY</h3>
                    </div>
                    <div class="tile-body">
                        @if ($bestSellingProducts->count() > 0)
                        <table class="table table-hover table-bordered" id="sampleTableFavorite">
                            <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá tiền</th>
                                <th>Số lượng đã bán</th>
                                <th>Danh mục</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($bestSellingProductDetails as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ $product->thumbnail }}" style="width: 100px; height: auto;" alt="">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->total_qty_sold }}</td> <!-- Thay $product-> total_sold thành $product->total_qty_sold -->
                                    <td>{{ $product->category->name }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        @else
                            <p>Không có sản phẩm bán chạy nào.</p>
                        @endif
{{--                        {!! $bestSellingProducts->links("pagination::bootstrap-4") !!}--}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Sản phẩm đã hết -->
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h3 class="tile-title">SẢN PHẨM ĐÃ HẾT</h3>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTableProduct">
                            <thead>

                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Số lượng</th>
                                <th>Tình trạng</th>
                                <th>Giá tiền</th>
                                <th>Danh mục</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($outOfStockProducts as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td><img src="{{ $product->thumbnail }}" alt="Product Image" width="100px"></td>
                                    <td>{{ $product->qty }}</td>
                                    <td><span class="badge bg-danger">Hết hàng</span></td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->Category->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $outOfStockProducts->links("pagination::bootstrap-4") !!}
                    </div>
                </div>
            </div>

        </div>

        <div class="text-right" style="font-size: 12px">
            <p><b>Hệ thống quản lý V2.0 | Code by Trường</b></p>
        </div>
    </main>
    @include("admin.layouts.js_BaoCao")

@endsection


