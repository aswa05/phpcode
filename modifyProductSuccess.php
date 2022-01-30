<?php
session_start();
//	$regValue = $_GET['fname'];
//echo $regValue;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sri Selva Ganapathy</title>
<link rel="stylesheet" type="text/css" href="newSriSelva.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}
table, th, td {
	height:40px;
	text-align: center;
  border: 1px solid black;
  border-collapse: collapse;
}
select, option { text-align-last:center; 
font-size: 17px;
width:400px; height:30px;}
input, button { text-align:center; 
font-size: 17px;}
sub{font-size: 17px;
}
</style>

</head>
<body>



<div class="header">
  <h1>Sri Selva Ganapathy Store</h1>
  <p>Fertilizer and Pesticide retailer</p>
</div>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sriselva";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);}

$productNo=$_GET['productNo'];
$productName=$_GET['productName'];
$price=$_GET['price'];
$stock=$_GET['stock'];
$gstPercentage=$_GET['gstPercentage'];

$sql="UPDATE `product` SET `productName`='$productName',`price`=$price,`stock`=$stock WHERE productNo=$productNo";

if ($conn->query($sql) === TRUE) {
  $status="Y";
} else {
	$status="N";
  //echo "Error: " . $sql . "<br>" . $conn->error;
}


?>


<div class="navbar">
  <a href="newSriSelva.php" >New Bill</a>
  <a href="modifyBill.php">Modify Bill</a>
  <a href="viewBill.php">View Bill</a>
<a href="SriSelva.php" class="right">Home</a>
  <a href="stock.php" class="right" >Stock</a>
  
</div>

<div class="row">
  <div class="side">
    <h2>About </h2>

    <div class="fakeimg" style="height:200px;"><img src="fertilizer.jpg" style="width:100%;"></div>
     <p>Successful people always have two things on their lips:"Silence and Smile"</p>
	<p>smile to solve the problem and silence to avoid the problem</p>
    <h3>More Information</h3>

    <div class="fakeimg" style="height:60px; padding:20px;">TIN No. 33724380652</div><br>
    <div class="fakeimg" style="height:60px; padding:20px;">F.L.No. CUD/R-030/16-19</div><br>
    <div class="fakeimg" style="height:60px; padding:20px;">P.L.No. 5/87-89</div><br>
	<div class="fakeimg" style="height:80px; padding:20px;"><img src="whatsapp.jpg" style="width:20px; height:20px;"><sup>9443338256</sup><br>
	<img src="whatsapp.jpg" style="width:20px; height:20px;"><sup>9487738256</sup></div>
  </div>
   <div class="main">
   <center>  <p> <?php 
   if($status=="Y")
   {	
echo '<img src="smile.jpg" style="width:250px; height:250px;"><br><br>';
echo "<h2><b>The new product details successfully stored in database</b></h2><br>
 <a href='stock.php'>Click here to go back to Stock Details</a>";
}
else
{ 
echo '<img src="sad.jpg" style="width:250px; height:250px;"><br><br>';
echo "<h2><b>Error: " . $sql . "<br>" . $conn->error . "</b></h2><br>
 <a href='stock.php'>Click here to go back to Stock Details</a>";
}
?>	</p></center>
   </div>
  </div>
 
  <?php
$conn->close();
 ?>

</body>
</html>
