<?php
session_start();

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

side {
  flex: 50%;
  background-color: #f1f1f1;
  padding: 20px;
}

</style>

</head>
<body>
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

$fivePercent='';
$eighteenPercent='';
$twelvePercent='';
$sql="SELECT productName, price, stock FROM product where gstPercentage=5 order by productNo";
	$result = $conn->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$fivePercent.='<tr><td>'.$row['productName'].'</td><td>'.$row['price'].'</td><td>'.$row['stock'].'</td></tr>';
	}
}
else
{
	$fivePercent='<tr><td colspan="3"> No Stock Found</td></tr>';
}
$sql="SELECT productName, price, stock FROM product where gstPercentage=12 order by productNo";
	$result = $conn->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$twelvePercent.='<tr><td>'.$row['productName'].'</td><td>'.$row['price'].'</td><td>'.$row['stock'].'</td></tr>';
	}
}
else
{
	$twelvePercent='<tr><td colspan="3"> No Stock Found</td></tr>';
}
$sql="SELECT productName, price, stock FROM product where gstPercentage=18 order by productNo";
	$result = $conn->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$eighteenPercent.='<tr><td>'.$row['productName'].'</td><td>'.$row['price'].'</td><td>'.$row['stock'].'</td></tr>';
	}
}
else
{
	$eighteenPercent='<tr><td colspan="3"> No Stock Found</td></tr>';
}
?>
<div class="header">
  <h1>Sri Selva Ganapathy Store</h1>
  <p>Fertilizer and Pesticide retailer</p>
</div>



<div class="navbar">
  <a href="newSriSelva.php" >New Bill</a>
  <a href="modifyBill.php">Modify Bill</a>
  <a href="viewBill.php">View Bill</a>
  <a href="SriSelva.php" class="right">Home</a>
  <a href="stock.php" style="background-color: #ddd; color: black;" class="right">Stock</a>
  
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
 <table  id="myTable" style="width:33.33%; float: left;  ">
 <tr style="background: #ddd;"><th colspan="3">5 Percentage</th></tr>
 <tr style="background: #ddd;"><th>Product</th><th>Price</th><th>Stock</th></tr>
 <?php echo $fivePercent; ?>
 <tr><td colspan="1" style="border:none;width:33.33%; ">
<form method="get" action="addProduct.php" ><button type="submit" name="gstPercentage" value="5">	
Add stock</button></form></td><td  colspan="1" style="border:none; width:33.33%;">
<form method="get" action="modifyProduct.php" ><button type="submit"  name="gstPercentage" value="5">	
Modify stock</button></form></td> <td  colspan="1" style="border:none; width:33.33%;">
<form method="get" action="deleteProduct.php" ><button type="submit"  name="gstPercentage" value="5">	
Delete stock</button></form>
 </td></tr>
 </table>
 <table  id="myTable"  style="width:33.33%;  float: left;">
 <tr style="background: #ddd;"><th colspan="3">18 Percentage</th></tr>
 <tr style="background: #ddd;"><th>Product</th><th>Price</th><th>Stock</th></tr>
 <?php echo $eighteenPercent; ?>
 <tr><td colspan="1" style="border:none; width:33.33%;">
<form method="get" action="addProduct.php" ><button type="submit" name="gstPercentage" value="18">	
Add stock</button></form></td><td  colspan="1" style="border:none; width:33.33%;">
<form method="get" action="modifyProduct.php" ><button type="submit"  name="gstPercentage" value="18">	
Modify stock</button></form></td> <td  colspan="1" style="border:none; width:33.33%;">
<form method="get" action="deleteProduct.php" ><button type="submit"  name="gstPercentage" value="18">	
Delete stock</button></form>
 </td></tr>
 </table>
 <table id="myTable"  style="width:33.33%;  float: left;">
 <tr style="background: #ddd;"><th colspan="3">12 Percentage</th></tr>
 <tr style="background: #ddd;"><th>Product</th><th>Price</th><th>Stock</th></tr>
 <?php echo $twelvePercent; ?>
 <tr><td colspan="1" style="border:none; width:33.33%;">
<form method="get" action="addProduct.php" ><button type="submit" name="gstPercentage" value="12">	
Add stock</button></form></td><td  colspan="1" style="border:none; width:33.33%;">
<form method="get" action="modifyProduct.php" ><button type="submit"  name="gstPercentage" value="12">	
Modify stock</button></form></td> <td  colspan="1" style="border:none; width:33.33%;">
<form method="get" action="deleteProduct.php" ><button type="submit"  name="gstPercentage" value="12">	
Delete stock</button></form>
 </td></tr>
 </table>
  </div>
  </div>



</body>
</html>
