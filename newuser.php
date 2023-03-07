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
							<form method="POST" action="newuser_proc.php">
								<div class="form-group">
									<span class="form-label">Name</span>
									<input class="form-control" type="text" id="uname" name= "uname" placeholder="Enter First name" required>
								</div>
								
                                <div class="form-group">
									<span class="form-label">Email</span>
									<input class="form-control" type="email" id="email" name= "uemail" placeholder="Enter Phone Number" required>
								</div>
								
								<div class="form-group">
									<span class="form-label">Phone Number</span>
									<input class="form-control" type="text" id="uphone" name= "uphone" placeholder="Enter Phone Number" required>
								</div>

                                <div class="form-group">
									<span class="form-label">Password</span>
									<input class="form-control" type="password" id="upass" name= "upass" placeholder="Enter Phone Number" required>
								</div>
								
                                <button name="register" id="register" type="submit">Create Account  </button>
                                <a href="book.php">I am not new</a>  
</div>
					
					
</form>
<div>
                            <br>
							
						</div>
                     
					</div>
				</div>
			</div>
		</div>
	</div>
	
    </body>

</html>