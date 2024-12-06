
<h2>Xin chào, {{ $user->name }}</h2>
<p>Vui lòng nhấp vào liên kết dưới đây để xác thực tài khoản của bạn:</p>
<a href="{{ url('email/verify/' . $token) }}">Xác thực tài khoản</a>
