<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css')}}">
    <link rel="stylesheet" href="{{('css/style.css')}}">
    <title>Login</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <input type="date" name="ngaysinh" placeholder="Date of Birth" required>
                <input type="text" name="diachi" placeholder="Address" required>
                <input type="text" name="sdt" placeholder="Phone Number" required>
                <button type="submit">Sign Up</button>
            </form>
            
        </div>
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Sign In</h1>
                @if(session('fail'))
                    <div class="alert alert-danger">
                        <p style="color:red">Sai tên đăng nhập hoặc mật khẩu rồi bạn</p>
                    </div>
                @endif
                @if(session('success'))
                <div class="alert alert-danger">
                    <p style="color:red">Đăng kí oke,sài tiền đi</p>
                </div>
            @endif
                <div class="social-icons">
                    <a href="{{ route('auth.google') }}"  class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <a href="{{ url('resetPassword') }}">Forget Your Password?</a>
                <button type="submit" style="color: white !important;">Sign In</button>
            </form>
            
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{('js/script.js')}}"></script>
</body>

</html>