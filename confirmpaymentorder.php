<?php 
require("orderstatus_api.php");
session_start();
$_SESSION['login']= 1;



?>
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
				
						<div class="booking-cta">
							<h1>Pay here</h1>
							<p>Thank you for using our service. Make payment here and we will direct you to your page

							</p>
						</div>
                        	<script src="https://js.paystack.co/v1/inline.js"></script>
							<button type="button" name="payment" id="register" onclick="payWithPaystack()"  >Make Payment</button>

					</div>
					<div class="col-md-4 col-md-pull-7">
						
								
								
									
						
								
								

						<!-- button to send information -->
						
                       
						
						</div>
                     
					</div>
			
		</div>
	</div>
	

    </body>

	
<script>

var ubutton = document.getElementById('register');

	function pay(){
	
	if(ubutton.innerText === "Make Payment"){
		payWithPaystack();

	}
	else{
		
	}
	}

function payWithPaystack() {

var handler = PaystackPop.setup({
  key: 'pk_test_6b063fba65f6c17380390da6f35ced7ca3a8df01', // Replace with your public key
  email: "nanakwabena123@hotmail.com",
  amount: 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
  currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars
  ref: ''+Math.floor((Math.random() * 1000000000) + 1), // Replace with a reference you generated
  callback: function(response) {
    //this happens after the payment is completed successfully
    var reference = response.reference;
    console.log(reference)
    alert('Payment complete! Reference: ' + reference);
    
    // Make an AJAX call to your server with the reference to verify the transaction
        window.location.href ="orderstatus.php";
  
  },
  onClose: function() {
    alert('Transaction was not completed, window closed.');


  },
});
handler.openIframe();

}

</script>
</html>