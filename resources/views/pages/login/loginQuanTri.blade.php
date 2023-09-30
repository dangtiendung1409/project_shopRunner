@extends("layouts.login.index")
@section("main")
<div class="background"></div>
<div class="container">
    <div class="item">
        <h2 class="logo"></h2>
        <div class="text-item">
            <h2>Welcome<br><span>
                    To Admin Page
                </span></h2>
            <p>Running is not just exercise, but also a journey of self-discovery</p>
            <div class="social-icon">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-youtube'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-linkedin'></i></a>
            </div>
        </div>
    </div>
    <div class="login-section">
        <div class="form-box login">
            <form action="">
                <h2 style="color:#FFBA00;">Sign In</h2>
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-envelope'></i></span>
                    <input type="email" required>
                    <label >Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                    <input type="password" required>
                    <label>Password</label>
                </div>
                <button class="btn">Login In</button>

            </form>
        </div>
    </div>
</div>
@endsection
