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
            <li><a class="app-menu__item" href="{{url("admin/admin-quan-ly-khach-hang")}}"><i class="fa-solid fa-users"></i><span style="margin-left: 21px"
                                                                                                                                  class="app-menu__label">Quản lý khách hàng</span></a></li>
            <li style=" background: #c6defd; border-radius: .375rem;"><a  style="color: rgb(22 22 72)" class="app-menu__item" href="{{url("admin/admin-quan-ly-san-pham")}}"><i
                        class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
            </li>
            <li ><a class="app-menu__item" href="{{url("admin/admin-quan-ly-đon-hang")}}"><i class='app-menu__icon bx bx-task'></i><span
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
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">Danh sách sản phẩm</li>
                <li class="breadcrumb-item"><a href="#">chỉnh sửa sản phẩm</a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tạo mới sản phẩm</h3>
                    <div class="tile-body">
                        <form class="row"  action="{{url("admin/admin-edit-nhan-vien",['user'=>$user->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="form-group col-md-3">
                                <label class="control-label">Full name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control"  placeholder="Enter Name" required>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            <div class="form-group  col-md-3">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" value="{{$user->email}}" name="email" class="form-control"  placeholder="Price">
                                @error("email")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="form-group col-md-3 ">
                                <label>Telephone</label>
                                <input type="text" value="{{$user->tel}}" name="tel" class="form-control"  placeholder="Telephone">
                                @error("tel")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            <div class="form-group col-md-3 ">
                                <label>Address</label>
                                <input type="text" value="{{$user->address}}" name="address" class="form-control"  placeholder="Address">
                                @error("address")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label">Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control-file" id="employeeImage" accept="image/*">
                                <button class="btn btn-delete-image" type="button" id="deleteImage" style="display: none;"><i class="fas fa-times"></i></button>
                                <div id="imageContainer" class="mt-2" style="display: none;">
                                    <img src="" id="previewImage" width="100" height="100">
                                </div>
                            </div>
                            <button class="btn btn-save" type="submit">Submit</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </main>





    @include("admin.layouts.scripts-formAdd")
    @include("admin.layouts.js_formAddSanPham")
    @include("admin.layouts.scripts")
@endsection

