<!-- <?php 

// this page inserts a new booking into the orders table
// this page inserts a new customer into customer table
// this page inserts user items into order items table

//check if register form was submited
//by checking if the submit button element name was sent as part of the request


 // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md

	 require ("database.php");
    // collection form data
    
    // $useremail = $_SESSION['uemail'];
	$ordernumber = 0;


	//database connection parameters
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "laundrydb";

    function get_order_status($useremail, $ordernumber){
// Create connection
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);
// Check connection
if ($conn->connect_error) {
    //stop executing the code and echo error
  die("Connection failed: " . $conn->connect_error);
}

// get the value of user and put in variable
$customerid = "SELECT *  FROM customers WHERE user_email = '$useremail'";

if ($exeResult = $conn->query($customerid)) {
    $finalData = mysqli_fetch_assoc($exeResult);
    $id = $finalData['customer_id'];
    $sql = "SELECT * FROM orders WHERE customer_id = $id AND order_id = $ordernumber";
    
        if ($exeResult = $conn->query($sql) ) {
            $finalData = mysqli_fetch_assoc($exeResult);
           
            return $finalData;


           
            //header("location: book.php");
         
            }
        else{
            //header("location: bookLaundry.php.php");
            return false; 
            
            //echo'no';
            exit();

}
}
else{
  echo "";
}
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
    


?> -->