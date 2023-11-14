@extends("admin.layouts.app")
@section("main")

    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="app-title">
                    <ul class="app-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><b>Báo cáo doanh thu    </b></a></li>
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
                <div class="widget-small info coloured-icon"><i class='icon bx bxs-purchase-tag-alt fa-3x' ></i>
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
                <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart' ></i>
                    <div class="info">
                        <h4>Tổng thu nhập</h4>
                        <p><b>${{ number_format($totalRevenue, 2) }}</b></p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-tag-x' ></i>
                    <div class="info">
                        <h4>Hết hàng</h4>
                        <p><b>{{ $outOfStockProductCount }} sản phẩm</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon"><i class='icon fa-3x bx bxs-receipt' ></i>
                    <div class="info">
                        <h4>Đơn hàng hủy</h4>
                        <p><b>{{ $totalCancelledOrders }} đơn hàng</b></p>
                    </div>
                </div>
            </div>
        </div>


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
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h3 class="tile-title">SẢN PHẨM BÁN CHẠY</h3>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTableHot">
                            <thead>
                            <tr>
                                <th>Số lượng sản phẩm đã bán</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá tiền</th>

                                <th>Danh mục</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($bestSellingProducts as $product)
                                <tr>
                                    <td>{{ $product->orders_count }}</td>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>

                                    <td>{{ $product->category->name }}</td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h3 class="tile-title">SẢN PHẨM ĐƯỢC YÊU THÍCH </h3>
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
                    </div>
                </div>
            </div>
        </div>
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
                    </div>
                </div>
            </div>

        </div>



        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">DỮ LIỆU HÀNG THÁNG</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">THỐNG KÊ DOANH SỐ</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
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

