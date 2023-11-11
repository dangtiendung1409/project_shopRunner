@extends("admin.layouts.app")
@section("main")



    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="admin/images/hay.jpg" width="50px"
                                            alt="User Image">
            <div>
                <p class="app-sidebar__user-name"><b>Võ Trường</b></p>
                <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
            </div>
        </div>
        <hr>
        <ul class="app-menu">
            <li ><a  class="app-menu__item active" href="{{url("admin/admin-quan-ly-nhan-vien")}}"><i class='app-menu__icon bx bx-id-card'></i>
                    <span class="app-menu__label">Quản lý nhân viên</span></a></li>
            <li ><a  class="app-menu__item" href="{{url("admin/admin-quan-ly-khach-hang")}}"><i class="fa-solid fa-users"></i><span style="margin-left: 21px"
                                                                                                                                    class="app-menu__label">Quản lý khách hàng</span></a></li>

            <li><a class="app-menu__item" href="{{url("admin/admin-quan-ly-san-pham")}}"><i
                        class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
            </li>
            <li style=" background: #c6defd; border-radius: .375rem;"><a style="color: rgb(22 22 72)" class="app-menu__item" href="{{url("admin/admin-quan-ly-đon-hang")}}"><i class='app-menu__icon bx bx-task'></i><span
                        class="app-menu__label">Quản lý đơn hàng</span></a></li>
            <li><a class="app-menu__item" href="{{url("admin/admin-quan-ly-thong-tin-khuyen-mai")}}"><i class='app-menu__icon bx bx-user-voice'></i><span
                        class="app-menu__label">Quản lý thông tin khuyến mãi</span></a></li>


        </ul>
    </aside>

    <main class="app-content">
        <section class="order_details section_gap">
            <div class="container">
                <div class="row order_d_inner">
                    <div class="col-lg-4">
                        <div class="details_item">
                            <h4>Order Info</h4>
                            <ul class="list">
                                <li><a href="#"><span>Order number</span>: {{$order->id}}</a></li>
                                <li><a href="#"><span>Date</span>: {{ $order->created_at->format('d/m/Y') }}</a></li>
                                @foreach($order->Products as $item)
                                    <li><a href="#"><span>Total</span>: ${{$item->pivot->qty*$item->pivot->price}}</a></li>
                                @endforeach
                                <li><a href="#"><span>Payment method</span>: {{ $order->payment_method }}</a></li>
                                <li><a href="#"><span>Status</span>: {!! $order->getStatus() !!}</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="details_item">
                            <h4>Customer Information</h4>
                            <ul class="list">
                                <li><a href="#"><span>Full Name</span>: {{ $order->full_name}}</a></li>
                                <li><a href="#"><span>Telephone</span>: {{ $order->tel}}</a></li>
                                <li><a href="#"><span>Email</span>: {{ $order->email }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="details_item">
                            <h4>Shipping</h4>
                            <ul class="list">
                                <li><a href="#"><span>Shipping method</span>: {{ $order->shipping_method }}</a></li>
                                <li><a href="#"><span>Address</span>: {{ $order->address }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="order_details_table">
                    <h2>Order Details</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->Products as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td><img src="{{$item->thumbnail}}" width="120"/></td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->pivot->price}}</td>
                                    <td>{{$item->pivot->qty}}</td>
                                    <td>${{$item->pivot->qty*$item->pivot->price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($order->status === 5 || $order->status === 4 || $order->status === 3 )
                    <button type="submit" class="btn btn-warning" style="float: right; margin-top: 10px;"><a
                            href="admin/admin-quan-ly-đon-hang">Back</a></button>

                @elseif($order->status === 2 )
                    <form method="post" action="{{ route('update_order_status', ['order' => $order->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-warning" style="float: right; margin-top: 10px;">Đã giao hàng</button>
                    </form>
                @elseif($order->status === 1 )
                    <form method="post" action="{{ route('update_order_status', ['order' => $order->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-warning" style="float: right; margin-top: 10px;">Giao hàng</button>
                    </form>

                    <form method="post" action="{{ route('update_order_status_cancel', ['order' => $order->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger" style="float: right; margin-top: 10px; margin-right: 10px;">Hủy</button>
                    </form>
                @elseif($order->status === 0 )
                    <form method="post" action="{{ route('update_order_status', ['order' => $order->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-warning" style="float: right; margin-top: 10px;">Xác nhận</button>
                    </form>

                    <form method="post" action="{{ route('update_order_status_cancel', ['order' => $order->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger" style="float: right; margin-top: 10px; margin-right: 10px;">Hủy</button>
                    </form>
                @endif
            </div>

        </section>
    </main>





    @include("admin.layouts.scripts-formAdd")
    @include("admin.layouts.js_formAddSanPham")
    @include("admin.layouts.scripts")
@endsection

