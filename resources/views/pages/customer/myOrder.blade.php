@extends("layouts.customer.app")
@section("main")

    <div class="contain">
        <div class="title">
            <div class="title-top">
                <p>Trang chủ  /  Tài khoản</p>
            </div>
            <div class="title-bottom">
                <h3>TÀI KHOẢN </h3>
            </div>
        </div>
        <div class="sidebar">
            <img src="images/img.jpg" alt="Avatar" class="profile-img">
            <div class="username">Tên tài khoản</div>
            <button class="logout-button">Đăng xuất</button>
            <ul>
                <div class="menu">
                    <i style="color: #ff5722;" class="fa-solid fa-file-circle-check"></i>
                    <a>
                        <li style="color: #ff5722;" class="li1">Đơn hàng của tôi</li>
                    </a>
                </div>
                <div class="menu">
                    <i class="fa-solid fa-lock"></i>
                    <a>
                        <li >Đổi mật khẩu</li>
                    </a>
                </div>
                <div class="menu">
                    <i class="fa-solid fa-heart"></i>
                    <a>
                        <li >sản phẩm yêu thích</li>
                    </a>
                </div>
            </ul>
        </div>

        <div class="content">
            <div class="content-top">
                <div class="content-top-title">
                    <p>đơn hàng của tôi </p>
                </div>
                <div class="content-top-title">
                    <p>0 đơn hàng </p>
                </div>
            </div>
            <table class="order-table">
                <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày mua</th>
                    <th>Địa chỉ</th>
                    <th>Giá trị đơn hàng</th>
                    <th>Trạng thái thanh toán</th>
                    <th>Trạng thái vận chuyển</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>001</td>
                    <td>2023-09-25</td>
                    <td>123 Đường ABC, Thành phố XYZ</td>
                    <td>$100.00</td>
                    <td>Đã thanh toán</td>
                    <td>Đang vận chuyển</td>
                </tr>
                <!-- Thêm các hàng khác tương tự cho các đơn hàng khác -->
                </tbody>
            </table>
        </div>
    </div>
@endsection
