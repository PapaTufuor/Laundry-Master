<?php


if (isset($_POST['register'])) 
{
//collection form data
$user_name =  $_POST['uname'];
$user_pass =  $_POST['upass'];
$user_phone = $_POST['uphone'];
$user_email = $_POST['uemail'];

//encrypt password
$encrypted_pass = password_hash($user_pass, PASSWORD_DEFAULT);



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



// write into customer
$sql_customer = "INSERT INTO customers ( user_name, user_number, user_email, user_pass)
VALUES ('$user_name', '$user_phone','$user_email', '$encrypted_pass')";

// //write into payment
// $sql_payment = "INSERT INTO payments(payment_id,customer_id,payment_date,amount) 
// VALUES ('$paymentid','$customerid','$delivery_date',10,)";

// check if query worked
if ($conn->query($sql_customer) === TRUE ) {
 
   session_start();
   $_SESSION['uemail'] = $user_email;


   header("Location:bookLaundry.php");
   exit();
   }
else{

    header("Location:newuser.php");

   exit();

}

}
?>