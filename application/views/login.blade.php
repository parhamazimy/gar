<!DOCTYPE html>
<html lang="fa_IR">
<head>
	<!-- Header meta tags -->
	<meta charset="utf-8">
	<title> ورود</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">		
	<meta name="description" content="">
	<meta name="author" content="">
	<style>

		@import url("{{$root}}/public/css/fontiran.css");

		* {
			margin: 0;
			padding: 0;
		}

		html {
			min-height: 100%;
			background: linear-gradient(rgba(196, 102, 0, 0.2), rgba(155, 89, 182, 0.2)),  url('{{$root}}public/img/register.png');
		}
		body {
			padding-top: 50px;
			font-family: 'DroidNaskh';
			direction:rtl;
		}
		#msform {
			width: 50%;
			margin: 50px auto;
			text-align: center;
			position: relative;
		}

		#msform fieldset {
			background: white;
			border: 0 none;
			border-radius: 3px;
			box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
			padding: 20px 30px;
			box-sizing: border-box;
			width: 80%;
			margin: 0 10%;
			position: absolute;
		}

		#msform fieldset:not(:first-of-type) {
			display: none;
		}

		#msform fieldset > input {
			padding: 15px;
			border: 1px solid #ccc;
			border-radius: 3px;
			margin-bottom: 10px;
			width: 100%;
			box-sizing: border-box;
			font-family: 'DroidNaskh';
			color: #2C3E50;
			font-size: 13px;
		}
		#msform label {
			display: block;
			text-align: right;
			clear: both;
			margin-bottom: 20px;
		}

		#msform .action-button {
			width: 150px;
			background: #27AE60;
			font-weight: bold;
			color: white;
			border: 0 none;
			border-radius: 1px;
			cursor: pointer;
			padding: 10px 5px;
			margin: 10px 5px;
		}

		#msform .action-button:hover, #msform .action-button:focus {
			box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
		}

		.fs-title {
			font-size: 15px;
			text-transform: uppercase;
			color: #2C3E50;
			margin-bottom: 10px;
		}

		.fs-subtitle {
			font-weight: normal;
			font-size: 13px;
			color: #666;
			margin-bottom: 20px;
		}

		@media (max-width: 767px) {
			#msform {width: 98%}
			#msform fieldset {width: 90%; margin: 0 5%}
		}

	</style>

	<!-- Fav and touch icons -->
	<link rel="shortcut icon" href="{{$root}}public/img/favicon/favicon.png">

	<!-- Header scripts -->
	<script type="text/javascript" src="{{$root}}public/js/modernizr-custom.js"></script>
</head>

<body>

	<h1 align="center">سامانه جامع مدیریت پادگان</h1>

	<!-- multistep form -->
	{!! form_open('login/index', ' id="msform"') !!}

		<!-- fieldsets -->
		<fieldset>
			@if(!empty($message))
				<div class="alert b#ffa1a1" style="background-color: rgb(255, 161, 161);padding: 4px;margin: 10px">
					<strong style="color: #c30302">خطا !</strong>{!! $message !!}
				</div>
			@endif
			<h2 class="fs-title">همین حالا وارد شوید</h2>
			<input type="text" name="username" placeholder="کد ملی"  autocomplete="off"/>
			<input type="password" name="pass" placeholder="رمزعبور" autocomplete="off"/>
			<input type="submit" class="submit action-button" value="ورود" />
		</fieldset>

		<fieldset>
			<h2 class="fs-title">فراموشی رمزعبور</h2>
			<h3 class="fs-subtitle">برای بازنشانی رمزعبور ایمیل خود را وارد کنید.</h3>
			<input type="text" name="email" placeholder="ایمیل" />
			<input type="button" class="previous action-button b#fff t#333" value="بازگشت" />
			<input type="submit" class="submit action-button" value="ارسال" />
		</fieldset>


	{!! form_close() !!}


	<!-- downloaded scripts (for all pages) -->
	<script type="text/javascript" src="{{$root}}public/js/colorclass.html"></script>
	<script type="text/javascript" src="{{$root}}public/js/jquery.js"></script>

	<!-- inline custom script (for this page) -->


</body>
</html>