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
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách đơn hàng</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">

                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                                        class="fas fa-print"></i> In dữ liệu</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                        class="fas fa-trash-alt"></i> Xóa tất cả </a>
                            </div>
                        </div>

                        <form style="display: flex" action="{{url("admin/admin-quan-ly-đon-hang")}}" method="get">
                            <div class="input-group input-group-sm mr-2" style="width: 150px; margin-left: 5px;">
                                <input  type="text" name="grand_total" class="form-control" placeholder="Grand Total">
                            </div>

                            <div class="input-group input-group-sm mr-2" style="width: 150px;">
                                <input  type="text" name="shipping_method" class="form-control" placeholder="Shipping Method">
                            </div>

                            <div class="input-group input-group-sm mr-2" style="width: 150px;">
                                <input  type="text" name="payment_method" class="form-control" placeholder="Payment Method">
                            </div>

                            <div class="input-group input-group-sm mr-2" style="width: 150px; margin-left: 5px;">
                                <select style="height: 45px;" name="paid" class="form-control">
                                    <option >Select piad</option>
                                    <option value="1">Đã thanh toán</option>
                                    <option value="0">Chưa thanh toán</option>
                                </select>
                            </div>

                            <div class="input-group input-group-sm mr-2" style="width: 150px; margin-left: 5px;">
                                <select style="height: 45px;" name="status" class="form-control">
                                    <option value="0" >select status</option>
                                    <option value="pending" >Chờ xác nhận</option>
                                    <option value="confirmed" >Đã xác nhận</option>
                                    <option value="shipping" >Đang giao hàng</option>
                                    <option value="shipped">Đã giao hàng</option>
                                    <option value="complete" >Hoàn thành</option>
                                    <option value="cancel" >Huỷ</option>
                                </select>

                            </div>

                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input  value="{{app("request")->input("search")}}" type="text" name="search" class="form-control float-right" placeholder="Search">

                                <button style="height: 45px; margin-left: 3px;"  type="submit" class="btn btn-default">
                                    <i   class="fas fa-search"></i>
                                </button>

                            </div>
                        </form>

                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="all"></th>
                                <th>ID đơn hàng</th>
                                <th>Created At</th>
                                <th>Grand Total</th>
                                <th>Full Name</th>
                                <th>Shipping Method</th>
                                <th>Payment Method</th>
                                <th>Paid</th>
                                <th>Status</th>
                                <th width="60">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                            <tr>
                                <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->getGrandTotal()}}</td>
                                <td>{{$item->full_name}}</td>
                                <td>{{$item->shipping_method}}</td>
                                <td>{{$item->payment_method}}</td>
                                <td>{!! $item->getPaid() !!}</td>
                                <td>{!! $item->getStatus() !!}</td>
                                <td style="display:flex;">
                                <form action="{{url("admin/admin-delete-đon-hang",['orders'=>$item->id])}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button onclick="return confirm('Chắc chắn muốn xoá sản phẩm: {{$item->name}}')" class="btn btn-primary btn-sm trash" type="submit"
                                    ><i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <button style="margin-left: 5px" class="btn btn-primary btn-sm edit" type="button" title="Sửa"  data-toggle="modal"
                                        data-target="#ModalUP"><a href="{{url("admin/admin-edit-đon-hang",['orders'=>$item->id])}}"><i class="fas fa-edit"></i></a></button>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include("admin.layouts.scripts")

@endsection
