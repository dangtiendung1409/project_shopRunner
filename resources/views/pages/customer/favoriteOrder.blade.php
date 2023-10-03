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
                    <i  class="fa-solid fa-file-circle-check"></i>
                    <a>
                        <li>Đơn hàng của tôi</li>
                    </a>
                </div>
                <div class="menu">
                    <i class="fa-solid fa-lock"></i>
                    <a>
                        <li >Đổi mật khẩu</li>
                    </a>
                </div>
                <div class="menu">
                    <i style="color: #ff5722;" class="fa-solid fa-heart"></i>
                    <a>
                        <li style="color: #ff5722;" >sản phẩm yêu thích</li>
                    </a>
                </div>
            </ul>
        </div>

        <div class="content">
            <div  class="content-top">
                <div class="content-top-title">
                    <p>Sản phẩm yêu thích </p>
                </div>
                <div class="content-top-title">
                    <p>Sản phẩm</p>
                </div>
            </div>
            <table class="order-table">
                <thead>
                <tr>
                    <th></th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><img width="100px" src="images/img.jpg" alt=""></td>
                    <td>2023-09-25</td>
                    <td>123 Đường ABC, Thành phố XYZ</td>
                    <td><a href="#"><i class="fa-solid fa-xmark"></i></a></td>
                </tr>

                <!-- Thêm các hàng khác tương tự cho các đơn hàng khác -->
                </tbody>
            </table>
        </div>
    </div>

@endsection
