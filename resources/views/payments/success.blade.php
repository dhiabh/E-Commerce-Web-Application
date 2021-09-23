
<html>
<head>
<title>Payment Successfull</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- Animate.css -->
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
<!-- Icomoon Icon Fonts-->
<link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
<!-- Bootstrap  -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

<!-- Flexslider  -->
<link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">

<!-- Owl Carousel  -->
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

<!-- Theme style  -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<style type="text/css">
    body
    {
        background:#f2f2f2;
		margin: 0;
		position: absolute;
		top: 40%;
		left: 50%;
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
    }

    .payment
	{
		border:5px solid #f2f2f2;
		padding: 2rem;
        background:#fff;
	}
   .payment_header
   {
	   background:#d1c286;
	   padding:20px;
       //border-radius:20px 20px 0px 0px;
	   
   }
   
   .check
   {
	   margin:0px auto;
	   width:50px;
	   height:50px;
	   border-radius:100%;
	   background:#fff;
	   text-align:center;
   }
   
   .check i
   {
	   vertical-align:middle;
	   line-height:50px;
	   font-size:30px;
   }

    .content 
    {
        text-align:center;
    }

    .content  h1
    {
        font-size:36px;
        padding-top:25px;
    }

    .content a
    {
        //width:200px;
        //height:40px;
        //color:#fff;
        //border-radius:30px;
        //padding:5px 10px;
    }

    .content a:hover
    {
        text-decoration:none;
        background:#000;
    }
   
</style>
</head>

<body>
<div class="container">
   <div class="row">
      <div class="col-md-6 mx-auto mt-5">
         <div class="payment">
            <div class="payment_header">
               <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
            </div>
            <div class="content">
               <h1><strong>Payment Successfull !</strong></h1>
               <p><strong>Your payment has been successfully completed. Your account has been charged ${{ $amount }} and your transaction was successfull.
               </p></strong>
      			<form action="{{ route('home') }}">
                	<button class="btn btn-primary">Go to Home</button>
                </form>
            </div>
         </div>
      </div>
   </div>
</div>
</body>
</html>




