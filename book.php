
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="assets/booking/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="assets/booking/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Book bubble service</h1>
							<p>Kindly use this form to give us the information 
                                we need to provide you with a good service. Booking will 
                                the process

							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form method="POST" action="checkbooking_proc.php">
								<div class="form-group">
									<span class="form-label">Email</span>
									<input class="form-control" type="email" placeholder="Enter Email" name="uemail">
								</div>
								<div class="form-group">
									<span class="form-label">Order Number</span>
									<input class="form-control" type="text" placeholder="Enter Order Number" name="ordernum">
								</div>
                                <div>
									<a href="bookLaundry.php">Haven't booked? Book here</a>  
								</div>
							
									
								
								
									
							<br>
								<div class="form-btn">
									<button class="submit-btn" id="login" name="login" type="submit">Enter
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>