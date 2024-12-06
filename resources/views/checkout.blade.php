<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout</title>
    <link href="{{('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{('css/price-range.css')}}" rel="stylesheet">
    <link href="{{('css/animate.css')}}" rel="stylesheet">
	<link href="{{('css/main.css')}}" rel="stylesheet">
	<link href="{{('css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	@include('header')

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">KIỂM TRA THÔNG TIN (kiểm tra kỹ thông tin trước khi đặt hàng)</h2>
			</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Hóa đơn</p>
							<div class="form-one">
								<form>
									<label>Tên đăng nhập:</label>
									<input type="text" placeholder="Tên người dùng" readonly>
									<label>Họ và tên:</label>
									<input type="text" placeholder="Họ và tên" readonly>
									<label>Gmail:</label>
									<input type="text" placeholder="Gmail" readonly>
									<label>Số điện thoại:</label>
									<input type="text" placeholder="Số điện thoại" readonly>
								</form>
							</div>
							<div class="form-two">
								<form>
									<label>Địa chỉ:</label>
									<input type="text" placeholder="Số nhà" readonly>
									<input type="text" placeholder="Quận/Huyện">
									<input type="text" placeholder="Thành Phố">
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Ghi chú</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/one.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>$59</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>$59</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox">Ship COD</label>
					</span>
					<span>
						<label><input type="checkbox">Momo</label>
					</span>
					<span>
						<label><input type="checkbox">ShopeePay</label>
					</span>
					<a class="btn btn-default check_out" href="{{URL::to('#')}}">Đặt hàng</a>
				</div>

		</div>
	</section> <!--/#cart_items-->

	

	@include('footer')
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>