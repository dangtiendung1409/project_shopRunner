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
            <button class="logout-button">Log out</button>
            <ul>
                <div class="menu">
                    <i class="fa-solid fa-file-circle-check"></i>
                    <a href="{{url("my-order")}}">
                        <li >My order</li>
                    </a>
                </div>
                <div class="menu">
                    <i style="color: #ff5722;" class="fa-solid fa-lock"></i>
                    <a href="{{url("change-password")}}">
                        <li style="color: #ff5722;">Change password</li>
                    </a>
                </div>
                <div class="menu">
                    <i class="fa-solid fa-heart"></i>
                    <a href="{{url("favorite-order")}}">
                        <li >favorite product</li>
                    </a>
                </div>
            </ul>
        </div>

        <div  class="content">
            <div class="content-top">
                <p>Đổi mật khẩu(Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác)</p>
            </div>
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">hập lại mật khẩu</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection

