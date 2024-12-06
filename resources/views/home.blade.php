<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
</head>

<body>
    @include('header')

    <section>
        <div class="container" style="margin-top: 40px;">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2 style="font-size: 18px; font-weight: bold; color: #333; padding-bottom: 10px;">Category</h2>
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
                                <div class="product-image-wrapper" style="margin-bottom: 20px;">
                                    <div class="single-products" style="border: 1px solid #ddd; border-radius: 5px; padding: 10px;">
                                        <div class="productinfo text-center">
                                            <!-- Đặt kích thước ảnh cố định -->
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                                            <h2 style="font-size: 20px; font-weight: bold; color: #e67e22;">${{ $product->price }}</h2>
                                            <p style="font-size: 16px; color: #555;">{{ $product->name }}</p>
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="price" value="{{ $product->price }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <button type="submit" class="btn btn-default add-to-cart" style="background-color: #e67e22; color: #fff; padding: 10px 20px; border-radius: 5px;">
                                                    <i class="fa fa-shopping-cart"></i> Add to cart
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="choose" style="display: none;">
                                        <!-- Removed Add to wishlist and Add to compare -->
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

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/price-range.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
