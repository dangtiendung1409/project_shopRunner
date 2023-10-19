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
            <li style=" background: #c6defd; border-radius: .375rem;"><a style="color: rgb(22 22 72)" class="app-menu__item active" href="{{url("admin-quan-ly-nhan-vien")}}"><i class='app-menu__icon bx bx-id-card'></i>
                    <span class="app-menu__label">Quản lý nhân viên</span></a></li>
            <li><a class="app-menu__item" href="{{url("admin-quan-ly-khach-hang")}}"><i class='app-menu__icon bx bx-user-voice'></i><span
                        class="app-menu__label">Quản lý khách hàng</span></a></li>
            <li><a class="app-menu__item" href="{{url("admin-quan-ly-san-pham")}}"><i
                        class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
            </li>
            <li><a class="app-menu__item" href="{{url("admin-quan-ly-đon-hang")}}"><i class='app-menu__icon bx bx-task'></i><span
                        class="app-menu__label">Quản lý đơn hàng</span></a></li>
            <li><a class="app-menu__item" href="{{url("admin-quan-ly-thong-tin-khuyen-mai")}}"><i class='app-menu__icon bx bx-user-voice'></i><span
                        class="app-menu__label">Quản lý thông tin khuyến mãi</span></a></li>

        </ul>
    </aside>

    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">Danh sách nhân viên</li>
                <li class="breadcrumb-item"><a href="#">Thêm nhân viên</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">

                    <h3 class="tile-title">Tạo mới nhân viên</h3>
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><b><i
                                            class="fas fa-folder-plus"></i> Tạo chức vụ mới</b></a>
                            </div>

                        </div>
                        <form class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label">ID nhân viên</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Họ và tên</label>
                                <input class="form-control" type="text" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Địa chỉ email</label>
                                <input class="form-control" type="text" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Địa chỉ thường trú</label>
                                <input class="form-control" type="text" required>
                            </div>
                            <div class="form-group  col-md-4">
                                <label class="control-label">Số điện thoại</label>
                                <input class="form-control" type="number" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Ngày sinh</label>
                                <input class="form-control" type="date">
                            </div>
                            <div class="form-group  col-md-3">
                                <label class="control-label">Nơi sinh</label>
                                <input class="form-control" type="text" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Số CMND</label>
                                <input class="form-control" type="number" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Ngày cấp</label>
                                <input class="form-control" type="date" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Nơi cấp</label>
                                <input class="form-control" type="text" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Giới tính</label>
                                <select class="form-control" id="exampleSelect2" required>
                                    <option>-- Chọn giới tính --</option>
                                    <option>Nam</option>
                                    <option>Nữ</option>
                                </select>
                            </div>

                            <div class="form-group  col-md-3">
                                <label for="exampleSelect1" class="control-label">Chức vụ</label>
                                <select class="form-control" id="exampleSelect1">
                                    <option>-- Chọn chức vụ --</option>
                                    <option>Bán hàng</option>
                                    <option>Tư vấn</option>
                                    <option>Dịch vụ</option>
                                    <option>Thu Ngân</option>
                                    <option>Quản kho</option>
                                    <option>Bảo trì</option>
                                    <option>Kiểm hàng</option>
                                    <option>Bảo vệ</option>
                                    <option>Tạp vụ</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Bằng cấp</label>
                                <select class="form-control" id="exampleSelect3">
                                    <option>-- Chọn bằng cấp --</option>
                                    <option>Tốt nghiệp Đại Học</option>
                                    <option>Tốt nghiệp Cao Đẳng</option>
                                    <option>Tốt nghiệp Phổ Thông</option>
                                    <option>Chưa tốt nghiệp</option>
                                    <option>Không bằng cấp</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Tình trạng hôn nhân</label>
                                <select class="form-control" id="exampleSelect2">
                                    <option>-- Chọn tình trạng hôn nhân --</option>
                                    <option>Độc thân</option>
                                    <option>Đã kết hôn</option>
                                    <option>Góa</option>
                                    <option>Khác</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label">Ảnh 3x4 nhân viên</label>
                                <input type="file" class="form-control-file" id="employeeImage" accept="image/*">
                                <button class="btn btn-delete-image" type="button" id="deleteImage" style="display: none;"><i class="fas fa-times"></i></button>
                                <div id="imageContainer" class="mt-2" style="display: none;">
                                    <img src="" id="previewImage" width="100" height="100">
                                </div>
                            </div>





                        </form>
                    </div>
                    <button class="btn btn-save" type="button">Lưu lại</button>
                    <a class="btn btn-cancel" href="{{url("admin-quan-ly-nhan-vien")}}">Hủy bỏ</a>
                </div>
            </div>
        </div>
    </main>
    <!--
    MODAL
    -->
    @include("admin.layouts.scripts-formAdd")

@endsection
