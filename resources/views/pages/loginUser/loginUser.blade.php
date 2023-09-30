@extends("layouts.loginUser.index")
@section("main")
    <div class="background"></div>
    <div class="container">
        <div class="item">
            <h2 class="logo"></h2>
            <div class="text-item">
                <h2>Welcome! <br><span>
                    To Shop Runner
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
                    <div class="create-account">
                        <p>Create A New Account? <a style="color:#FFBA00;" href="#" class="register-link">Sign Up</a></p>
                    </div>
                </form>
            </div>
            <div class="form-box register">
                <form action="">

                    <h2 style="color: #FFBA00;">Sign Up</h2>

                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="text" required>
                        <label >Username</label>
                    </div>
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
                    <div class="remember-password">
                        <label for=""><input type="checkbox">I agree with this statment</label>
                    </div>
                    <button class="btn">Login In</button>
                    <div class="create-account">
                        <p>Already Have An Account? <a style="color: #FFBA00;" href="#" class="login-link">Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
