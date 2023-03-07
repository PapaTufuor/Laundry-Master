<?php 
require("orderstatus_api.php");
session_start();
$useremail=$_SESSION['uemail'];
$ordernum =$_SESSION['ordernum'];

//$data=get_order_status($useremail);

if (isset($_SESSION['login'])){
  $data=get_order_status($useremail, $ordernum);
}
else{
  header("Location: newuser.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link type="text/css" rel="stylesheet" href="assets/css/orderstatus.css" />


</head>
<body>
<div class="container">
  <div class="iphone">
    <div class="header">
      <div class="order-summary">
        <div class="order-status">Booking date</div>
        <div class="order-date">
        <?php echo( $data["order_date"])?>
        </div>
        <div class="order-day">
          Friday
        </div>
        <div class="cta-button-container">
        <button  onclick="movetologout()" class="cta-button">Logout</button>
      </div>
      </div>

    </div>
    <div class="hero-img-container">
      <div class="triangle1"></div>
      <div class="arc"></div>
      <div class="pattern"></div>
      <img src="https://drive.google.com/uc?id=15iXUI6DkRr5Zcp0yH5uF2U47ycr-WzUY" class="hero-img">
    </div>
    <div class="order-status-container">
     <div class="status-item first">
       <div class="status-circle"></div>
       <div class="status-text">
         Pending
       </div>
      </div>
      <div class="status-item second">
       <div class="status-circle"></div>
       <div class="status-text">
         Washing
       </div>
      </div>
      <div class="status-item">
        <div class="status-circle"></div>
        <div class="status-text green">
        <span>Out</span><span>for delivery</span>
        </div>
      </div>
      <div class="status-item">
        <div class="status-circle"></div>
       <div class="status-text green">
         <span>Delivery</span>
         <span>03&nbsp;-&nbsp;05</span>
       </div>
      </div>
      </div>
    <div class="order-details-container">
      <div class="odc-header">
      <div class="cta-text">See your product details</div>
      
      </div>
      <div class="odc-wrapper">
      <div class="odc-header-line">
        Your order details
      </div>
      <div class="odc-header-details">
      <div >
        5 items
      </div>
      <?php echo( $data["total_amount"])?>
      
      </div>
  
          </div>
         
        </div>
      </div>
    
      
      
      
      </div>
    </div>
  </div>
  
</div>
</div>
<script type="text/javascript">

   	  const xhttp = new XMLHttpRequest();
				  xhttp.onload = function() {
				    // document.getElementById("demo").innerHTML = this.responseText;
				     alert(this.responseText);


				     //redirect
				    }
				  xhttp.open("GET", "orderstatus_api.php", true);
				  xhttp.send();
          
				
      function movetologout(){
        window.location.href ="logout.php";
      }
</script>
  </body>
</html>