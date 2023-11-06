@extends("admin.layouts.app")
@section("main")

    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="/admin/images/hay.jpg" width="50px"
                                            alt="User Image">
            <div>
                <p class="app-sidebar__user-name"><b>Võ Trường</b></p>
                <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
            </div>
        </div>
        <hr>
        <ul class="app-menu">
            <li style=" background: #c6defd; border-radius: .375rem;"><a style="color: rgb(22 22 72)" class="app-menu__item active" href="{{url("admin/admin-quan-ly-nhan-vien")}}"><i class='app-menu__icon bx bx-id-card'></i>
                    <span class="app-menu__label">Quản lý nhân viên</span></a></li>
            <li><a class="app-menu__item" href="{{url("admin/admin-quan-ly-khach-hang")}}"><i class='app-menu__icon bx bx-user-voice'></i><span
                        class="app-menu__label">Quản lý khách hàng</span></a></li>
            <li><a class="app-menu__item" href="{{url("admin/admin-quan-ly-san-pham")}}"><i
                        class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
            </li>
            <li><a class="app-menu__item" href="{{url("admin/admin-quan-ly-đon-hang")}}"><i class='app-menu__icon bx bx-task'></i><span
                        class="app-menu__label">Quản lý đơn hàng</span></a></li>
            <li><a class="app-menu__item active" href="{{url("admin/admin-bao-cao-doanh-thu")}}"><i
                        class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh thu</span></a>
            </li>
            <li><a class="app-menu__item" href="{{url("admin/admin-quan-ly-thong-tin-khuyen-mai")}}"><i class='app-menu__icon bx bx-user-voice'></i><span
                        class="app-menu__label">Quản lý thông tin khuyến mãi</span></a></li>

        </ul>
    </aside>



    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách nhân viên</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">

                        <div class="row element-button">
                            <div class="col-sm-2">

                                <a class="btn btn-add btn-sm" href="{{url("admin/admin-add-nhan-vien")}}" title="Thêm"><i class="fas fa-plus"></i>
                                    Tạo mới nhân viên</a>
                            </div>

                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                                        class="fas fa-print"></i> In dữ liệu</a>
                            </div>

                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                        class="fas fa-trash-alt"></i> Xóa tất cả </a>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
                               id="sampleTable">
                            <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="all"></th>
                                <th>ID </th>
                                <th width="150">Full name</th>
                                <th width="20">Email</th>
                                <th width="20">Thumbnail</th>
                                <th width="150">Address</th>
                                <th>Telephone</th>
                                <th width="70">Tính năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($user as $item)
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td><img class="img-card-person" src="{{$item->thumbnail}}" alt=""></td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->tel}}</td>
                                    <td style="display: flex; " class="table-td-center">
                                        <form action="{{url("admin/admin-delete-nhan-vien",['products'=>$item->id])}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button onclick="return confirm('Chắc chắn muốn xoá sản phẩm: {{$item->name}}')" class="btn btn-primary btn-sm trash" type="submit"
                                            ><i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        <button style="margin-left: 5px" class="btn btn-primary btn-sm edit" type="button" title="Sửa"  data-toggle="modal"
                                                data-target="#ModalUP"><a href="{{url("admin/admin-edit-nhan-vien",['user'=>$item->id])}}"><i class="fas fa-edit"></i></a></button>

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
