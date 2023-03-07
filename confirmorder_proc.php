<?php 
require("orderstatus_api.php");
session_start();
$useremail=$_SESSION['uemail'];


//$data=get_order_status($useremail);

if (isset($_SESSION['uemail'])){
  //$data=get_order_status($useremail, $ordernum);
}
else{
  header("Location: newuser.php");

}

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
							<form method="POST"  id="paymentform" action="confirmorder_proc.php" >
								
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Pick up</span>
											<input class="form-control" id="pickupdate" name= "pickup_date" type="date" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Delivery</span>
											<input class="form-control" id="deliverydate"  name= "delivery_date" type="date" required>
										</div>
									</div>
								</div>
						
								
										<div class="form-group">
											<span class="form-label">Items</span>
											
										
									<input 
									id="uitems"
										type="number" 
										class="form-control" 
										name="itemnum" 
										placeholder="Number of items" 
										required>
											
</div>
						<!-- button to send information -->
							<!-- <script src="https://js.paystack.co/v1/inline.js"></script> -->
							<button type="submit" name="payment" id="register"  >Confirm Order</button>
</form>
                            <br>
							<a href="book.php">I have a booking </a> 
						</div>
                     
					</div>
				</div>
			</div>
		</div>
	</div>
	
<script type="text/javascript">
	//colect the form data
	var ubutton = document.getElementById('register');
 	var useritems = document.getElementById('uitems');
 	var deliverydate = document.getElementById('deliverydate');
 	var pickupdate = document.getElementById('pickupdate');
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
	  ubutton.innerText = "Confirm Payment";
	  ubutton.setAttribute("type", "submit")
		
	
    },
    onClose: function() {
      alert('Transaction was not completed, window closed.');


    },
  });
  handler.openIframe();

}


function validatepost() 
	{
			event.preventDefault();
			//alert('email is valid');
			//call the ajax post function
			loadDoc(
				useritems.value,
				deliverydate.value,
				pickupdate.value,
				ubutton
				);
			
		}

		//make http post to backend register_proc.php
		function loadDoc(useritems,deliverydate,pickupdate, ubutton) 
		{
			  const xhttp = new XMLHttpRequest();
			  xhttp.onload = function() 
			  {
			  
			     //check if action was successful

			     if(this.responseText == 'success')
			     {
				console.log('sucess')
					// get users key and display it
					alert('Your key is ')
				
			     	window.location.href = 'orderstatus.php';
			     }
			     else
			     {
					console.log('failed')
			     	alert(this.responseText);
			     	return false;
			     }
				

	

			    }
			
  
			  xhttp.open("POST", "confirmorder_proc.php?itemnum="+useritems+"&delivery_date="+deliverydate+"&pickup_date="+pickupdate+"&payment="+ubutton, true);
			  xhttp.send();
		}
					
	</script>
    </body>

	

</html>