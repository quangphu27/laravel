
<html>
<body>
    <h1>Xin chào, {{ $user->name }}</h1>
    <p>Để xác thực tài khoản của bạn, vui lòng nhấp vào liên kết dưới đây:</p>
    <a href="{{ url('verify/'.$token) }}">Xác thực tài khoản</a>
</body>
</html>
