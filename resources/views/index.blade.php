<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Vang lai</title>
    <link href="{{('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{('css/price-range.css')}}" rel="stylesheet">
    <link href="{{('css/animate.css')}}" rel="stylesheet">
    <link href="{{('css/main.css')}}" rel="stylesheet">
    <link href="{{('css/responsive.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .navbar {
            background-color: #333;
            padding: 15px;
        }
        .navbar-brand, .navbar-nav a {
            color: #fff;
        }
        .navbar-nav a:hover {
            color: #e67e22;
        }
        .social-icons a {
            font-size: 20px;
            padding: 10px;
            transition: all 0.3s ease;
        }
        .social-icons a:hover {
            color: #fff;
            background-color: #333;
        }
        .col-sm-4 h1 {
            font-size: 50px;
            font-weight: bold;
            color: #e67e22;
            margin-top: 20px;
        }
        .left-sidebar {
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .left-sidebar h2 {
            color: #e67e22;
            margin-bottom: 15px;
        }
        .panel-group .panel {
            border-radius: 8px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }
        .panel-group .panel:hover {
            background-color: #f4f4f4;
        }
        .product-image-wrapper {
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .productinfo img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }
        .productinfo h2 {
            font-size: 20px;
            color: #e67e22;
        }
        .productinfo p {
            font-size: 16px;
            color: #555;
        }
        .btn {
            border-radius: 5px;
            padding: 10px 20px;
            background-color: #e67e22;
            color: white;
        }
        .btn:hover {
            background-color: #d35400;
        }
        .text-right a {
            padding: 15px 30px;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
        }
        .text-right a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <!-- Header and Social Links -->
    <div class="col-sm-4 text-center">
        <h1>Bacangga</h1>
    </div>
    <div class="col-sm-6">
        <div class="social-icons pull-right">
            <ul class="nav navbar-nav">
                <li><a href="#" style="color: #3b5998;"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" style="color: #1da1f2;"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" style="color: #0077b5;"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#" style="color: #ea4c89;"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#" style="color: #db4437;"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
    </div>

    <!-- Login/Register button -->
    <div class="text-right" style="margin-top: 20px;">
        <a href="{{ route('login') }}" class="btn btn-success" style="margin-top: 40px;">Đăng nhập/Đăng ký</a>
    </div>
    
    <section>
        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian">
                            @foreach($categories as $category)
                            <div class="panel panel-default" style="border: 1px solid #ddd; border-radius: 5px; margin-bottom: 10px;">
                                <div class="panel-heading" style="background-color: #f9f9f9; padding: 10px;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#category{{ $category->id }}" style="color: #333;">
                                            <span class="badge pull-right" style="background-color: #e67e22; color: #fff;"><i class="fa fa-plus"></i></span>
                                            {{ $category->name }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
    
                <!-- Main Content (Product List) -->
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center" style="font-size: 24px; font-weight: bold; color: #333; margin-bottom: 30px;">Products</h2>
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <!-- Đặt kích thước ảnh cố định -->
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                            <h2>${{ $product->price }}</h2>
                                            <p>{{ $product->name }}</p>
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="price" value="{{ $product->price }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <button type="submit" class="btn add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i> Add to cart
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
	@include('footer')
	
    <script src="{{('js/jquery.js')}}"></script>
	<script src="{{('js/bootstrap.min.js')}}"></script>
	<script src="{{('js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{('js/price-range.js')}}"></script>
    <script src="{{('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{('js/main.js')}}"></script>
</body>
</html>
