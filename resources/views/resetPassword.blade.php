<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Reset Password | E-Shopper</title>
    <link href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <script src="{{ asset('https://code.jquery.com/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') }}">     
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<div class="form-gap"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>You can reset your password here.</p>
                        @if($errors->has('email'))
                        <div class="alert alert-danger">
                            <p style="color:red">Nhập email cho đúng</p>
                        </div>
                    @endif

                        <div class="panel-body">
                            <!-- Form bắt buộc có @csrf để bảo vệ khỏi CSRF attack -->
                            <form id="register-form" role="form" autocomplete="off" class="form" method="POST" action="{{ route('resetPassword.submit') }}">
                                @csrf

                                <!-- Nhập Email -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="email" name="email" placeholder="Email address" class="form-control" type="email" required>
                                    </div>
                                </div>

                                <!-- Nút Reset Password -->
                                <div class="form-group">
                                    <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                </div>

                                <!-- Thêm token ẩn nếu cần -->
                                <input type="hidden" class="hide" name="token" id="token" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
