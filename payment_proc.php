<?php 
// this page inserts a new booking into the orders table
// this page inserts a new customer into customer table
// this page inserts user items into order items table

//check if register form was submited
//by checking if the submit button element name was sent as part of the request


 // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md

  if (isset($_POST['payment'])) 
 	{
	
    
    //	collection form data
    session_start();
    $useremail = $_SESSION['uemail'];
	$items = $_POST['itemnum'];
	$paymentdate = $_POST['pickup_date'];
  
	// Generate order number
	$ordernumber = rand(1000,10000);


	//calculate laundry cost
	$laundrycost = 5*$items;
   

	//database connection parameters
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "laundrydb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		//stop executing the code and echo error
	  die("Connection failed: " . $conn->connect_error);
	}

    // get the value of user and put in variable
    $customerid = "SELECT *  FROM customers WHERE user_email = '$useremail'";
    
    if ($exeResult = $conn->query($customerid)) {
		$finalData = mysqli_fetch_assoc($exeResult);
        echo "ss";
        $id = $finalData['customer_id'];

         $sql = "INSERT INTO payments (customer_id, payment_date, amount) VALUES ('$id', '$paymentdate','$laundrycost' )";
            
        	if ($conn->query($sql) === TRUE ) {
               
			echo	"<div id='booking' class='section'>";
	// 		echo	"<div class="section-center">"
	// 		echo	"	<div class="container">"
	// 					<div class="row">
	// 						<div class="col-md-7 col-md-push-5">
	// 							<div class="booking-cta">
	// 								<h1>Book bubble service</h1>
	// 								<p>Kindly use this form to give us the information 
	// 									we need to provide you with a good service. Booking will 
	// 									the process
		
	// 								</p>
	// 							</div>
	// 						</div>
	// 						<div class="col-md-4 col-md-pull-7">
	// 							<div class="booking-form">
	// 								<form method="POST"  id="paymentform" action="confirmorder_proc.php" >
										
	// 									<div class="row">
	// 										<div class="col-sm-6">
	// 											<div class="form-group">
	// 												<span class="form-label">Pick up</span>
	// 												<input class="form-control" id="pickupdate" name= "pickup_date" type="date" required>
	// 											</div>
	// 										</div>
	// 										<div class="col-sm-6">
	// 											<div class="form-group">
	// 												<span class="form-label">Delivery</span>
	// 												<input class="form-control" id="deliverydate"  name= "delivery_date" type="date" required>
	// 											</div>
	// 										</div>
	// 									</div>
								
										
	// 											<div class="form-group">
	// 												<span class="form-label">Items</span>
													
												
	// 										<input 
	// 										id="uitems"
	// 											type="number" 
	// 											class="form-control" 
	// 											name="itemnum" 
	// 											placeholder="Number of items" 
	// 											required>
													
	// echo	</div>
			
        		}
        	else{
        		//header("location: bookLaundry.php.php");
                echo"failed";
                
        		//echo'no';
        		exit();

	}
    }
    else{
      echo"";
    }
	// write and check if query worked


// 	//   // send sms message
// 	// 	$apiKey = urlencode('NDY2NTVhMzY2YzUzNzMzNjZjNmE3OTQzNjM3MDUwMzY=');
	
// 	// 	// Message details
// 	// 		$numbers = array($user_phone);
// 	// 		$sender = urlencode('Bubbles');
// 	// 		$message = rawurlencode('Your Order number is $ordernumber');
	 
// 	// 		$numbers = implode(',', $numbers);
	 
// 	// 	// Prepare data for POST request
// 	// 		$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
	 
// 	// 	// Send the POST request with cURL
// 	// 		$ch = curl_init('https://api.txtlocal.com/send/');
// 	// 		curl_setopt($ch, CURLOPT_POST, true);
// 	// 		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// 	// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	// 		$response = curl_exec($ch);
// 	// 		curl_close($ch);
		
// 	// 	// Process your response here
// 	// 		echo $response;
// 		//}
// // 		//redirect to homepage
// // 		// /header("Location: backend/.php");
	
// 		//exit();

// 	// } 
// 	// else {
// 	// 	//echo error but continue executing the code to close the session
// 	//   echo "Error: " . $sql_orderitems . "<br>" . $conn->error;
// 	// }


// 	//close database connection
// 	$conn->close();
// }

// else
// {
// 	//redirect to register page
// 	// header("Location: register.php");
// 	exit();
// }
    }


?>