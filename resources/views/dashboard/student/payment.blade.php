<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Payment</title>


    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}"/>


    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Font Awesome Pro -->
    <script src="{{ asset('js/font-awsome.min.js') }}"></script>

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Noty css -->
    <link href="{{ asset('vendors/noty/noty.css') }}" rel="stylesheet">
	<style>

  body{
	height:100vh;
	overflow:hidden;
	background:linear-gradient(-40deg,white,lightgrey);
	box-sizing:border-box;
	font-family: "Montserrat", sans-serif;
  }
  #wrapper{
	height:480px;
	width:700px;
	background:#fff;
	border:1px solid grey;
	border-radius:10px;
	margin:3em auto 0 auto;
	overflow:hidden;
	box-shadow:0px 2px 25px #000;
  }
  .row{
	display:flex;
	justify-content:center;
  }
  .row:nth-of-type(1) .col-xs-5{
	display:flex;
	flex-direction:column;
	align-items:center;
	background:#e6e6e6;
  /*   border:solid 1px transparent; */
	border-radius:4px;
	margin:1em 5px;
  }
  .row:nth-of-type(1) .col-xs-5 #cards{
	display:flex;
	flex-direction:row;
	flex-wrap:nowrap;
	justify-content:center;
  }
  .row:nth-of-type(1) .col-xs-5 #cards img{
	width:100px;
	height:100px;
  }

  .row:nth-of-type(2) .col-xs-5{
	display:flex;
	flex-direction:column;
	justify-content:space-around;
	flex-basis:45%;
  }
  .row:nth-of-type(2) .col-xs-5 input{
	border:2px solid lightgrey;
	height:35px;
	border-radius:10px;
	padding-left:10px;
  }
  .row .col-xs-5 input:focus, .row:nth-of-type(3) .col-xs-2 input:focus{
	border-color:green;
	outline:0;
  }
  label{
	position:relative;
  }
   .fa{
	position:absolute;
	right:25px;
	bottom:10px;
  }
  .row-three{
	display:flex;
	justify-content:space-around;
	align-items:baseline;
	align-content:space-between;
	margin:2em 1em 2.4em 1em;
  }
  .row:nth-of-type(3) .col-xs-2{
	flex-basis:50%;
  }
  .row:nth-of-type(3) .col-xs-5{
	flex-basis:40%;
	align-items:baseline;
  }
  .row:nth-of-type(3) .col-xs-2 input{
	height:35px;
	border:2px solid lightgrey;
	border-radius:10px;
	padding-left:10px;
  }
  .row:nth-of-type(3) .col-xs-5 .small{
	font-size:.70em;
  }
  footer{
	height:80px;;
	background:#e6e6e6;
	display:flex;
	flex-direction:row;
	justify-content:space-between;
	align-items:center;
  }
  footer .btn{
	margin:50px 15px 55px 15px;
	border-radius:20px;
	padding:.65em 1.6em;
  }
  footer :nth-child(1){
	background-color:#fff;
	color:#f62f5e;
  }
  footer :nth-child(2){
	background-color:#f62f5e;
	color:#fff;
  }
  .col-xs-5.highlight{
	border:solid 1px blue;
  }
	</style>
</head>
<body>
    <div class="container body">

<div id="wrapper">
	<div class="row">
	  <div class="col-xs-5">
		<div id="cards">
		  <img src="http://icons.iconarchive.com/icons/designbolts/credit-card-payment/256/Visa-icon.png">
		  <img src="http://icons.iconarchive.com/icons/designbolts/credit-card-payment/256/Master-Card-icon.png">
		</div><!--#cards end-->
		<div class="form-check">
	<label class="form-check-label" for='card'>
	  <input id="card" class="form-check-input" type="checkbox" value="">
	  Pay $150.00 with credit card
	</label>
  </div>
	  </div><!--col-xs-5 end-->
	  <div class="col-xs-5">
		<div id="cards">
		  <img src="http://icons.iconarchive.com/icons/designbolts/credit-card-payment/256/Paypal-icon.png">
		</div><!--#cards end-->
		<div class="form-check">
	<label class="form-check-label" for='paypal'>
	  <input id="paypal" class="form-check-input" type="checkbox" value="">
	  Pay $150.00 with PayPal
	</label>
  </div>
	  </div><!--col-xs-5 end-->
	</div><!--row end-->
	<div class="row">
	  <div class="col-xs-5">
		<i class="fa fa fa-user"></i>
		<label for="cardholder">Cardholder's Name</label>
		<input type="text" id="cardholder">
	  </div><!--col-xs-5-->
	  <div class="col-xs-5">
		<i class="fa fa-credit-card-alt"></i>
		<label for="cardnumber">Card Number</label>
		<input type="text" id="cardnumber">
	  </div><!--col-xs-5-->
	</div><!--row end-->
	<div class="row row-three">
	  <div class="col-xs-2">
		<i class="fa fa-calendar"></i>
		<label for="date">Valid thru</label>
		<input type="text" placeholder="MM/YY" id="date">
	  </div><!--col-xs-3-->
	  <div class="col-xs-2">
		<i class="fa fa-lock"></i>
		<label for="date">CVV / CVC *</label>
		<input type="text">
	  </div><!--col-xs-3-->
	  <div class="col-xs-5">
		<span class="small">* CVV or CVC is the card security code, unique three digits number on the back of your card seperate from its number.</span>
	  </div><!--col-xs-6 end-->
    </div><!--row end-->
    <br><br>
    <div style="float: right; margin-right:8px" >
	  <a href="{{ route('dashboard.home') }}"><button class="btn btn-dark">Back</button></a>
	  <a href="#"><button class="btn btn-success">Next Step</button></a>
    </div>

  </div><!--wrapper end-->



</div>
</body>
  </html>
