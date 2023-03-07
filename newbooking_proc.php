<?php 
// this page inserts a new booking into the orders table
// this page inserts a new customer into customer table
// this page inserts user items into order items table

//check if register form was submited
//by checking if the submit button element name was sent as part of the request


 // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md

  if (isset($_POST['booking'])) 
 	{
	
	//collection form data

	$items = $_POST['itemnum'];
	$pickup_date = $_POST['pickup_date'];
	$delivery_date = $_POST['delivery_date'];

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



	// //write into orders
	
	// $sql_payment = "INSERT INTO payments(payment_id,customer_id,payment_date,amount) 
	// VALUES ('$paymentid','$customerid','$delivery_date',10,)";

	// check if query worked
	if ($conn->query($sql) === TRUE ) {
		header("location: orderstatus.php");
		exit();
		}
	else{
		echo'no';
		exit();

	}
	//   // send sms message
	// 	$apiKey = urlencode('NDY2NTVhMzY2YzUzNzMzNjZjNmE3OTQzNjM3MDUwMzY=');
	
	// 	// Message details
	// 		$numbers = array($user_phone);
	// 		$sender = urlencode('Bubbles');
	// 		$message = rawurlencode('Your Order number is $ordernumber');
	 
	// 		$numbers = implode(',', $numbers);
	 
	// 	// Prepare data for POST request
	// 		$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
	 
	// 	// Send the POST request with cURL
	// 		$ch = curl_init('https://api.txtlocal.com/send/');
	// 		curl_setopt($ch, CURLOPT_POST, true);
	// 		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 		$response = curl_exec($ch);
	// 		curl_close($ch);
		
	// 	// Process your response here
	// 		echo $response;
		//}
// 		//redirect to homepage
// 		// /header("Location: backend/.php");
	
		//exit();

	// } 
	// else {
	// 	//echo error but continue executing the code to close the session
	//   echo "Error: " . $sql_orderitems . "<br>" . $conn->error;
	// }


	//close database connection
	$conn->close();
}

else
{
	//redirect to register page
	// header("Location: register.php");
	exit();
}



?>