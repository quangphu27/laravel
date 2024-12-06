<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Giỏ Hàng</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <style>
        .cart_info {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .cart_table th {
            background-color: #f1f1f1;
        }
        .cart_menu td {
            padding: 15px;
            font-weight: bold;
        }
        .cart_product img {
            width: 80px;
            height: auto;
        }
        .cart_quantity_button {
            display: flex;
            align-items: center;
        }
        .cart_quantity_input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
        }
        .cart_quantity_up,
        .cart_quantity_down {
            cursor: pointer;
            font-size: 18px;
            color: #007bff;
        }
        .cart_quantity_up:hover,
        .cart_quantity_down:hover {
            color: #0056b3;
        }
        .cart_delete a {
            color: #dc3545;
            font-size: 20px;
        }
        .cart_delete a:hover {
            color: #c82333;
        }
        .total_price {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-top: 20px;
            text-align: right;
        }
        .update_button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .update_button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    @include('header')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('home') }}">Home</a></li>
                    <li class="active">Giỏ hàng</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Sản phẩm</td>
                            <td class="description">Mô tả</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}"></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $item->product->name }}</a></h4>
                                    <p>ID: {{ $item->product->id }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ number_format($item->product->price, 0, ',', '.') }} VND</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input class="cart_quantity_input" type="number" name="quantity" value="{{ $item->quantity }}" autocomplete="off" size="2" min="1">
                                            <button type="submit" class="update_button">Cập nhật</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p>{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }} VND</p>
                                </td>
                                <td class="cart_delete">
                                    <a href="{{ route('cart.remove', $item->id) }}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="total_price">
                <p>Tổng số tiền bạn phải trả: {{ number_format($total, 0, ',', '.') }} VND</p>
            </div>
        </div>
    </section> 

    @include('footer')

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
