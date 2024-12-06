<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-info text-center">
            <h4>Đăng ký thành công!</h4>
            <p>Vui lòng kiểm tra email của bạn để xác thực tài khoản.</p>
            <a href="{{ route('login') }}" class="btn btn-primary mt-3">Quay lại đăng nhập</a>
        </div>
    </div>
</body>
</html>
