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
	height:60px;
	font-size: 17px;
	text-align: center;
  border: none;
  border-collapse: collapse;
}
select, option { text-align-last:center; 
font-size: 17px;
width:400px; height:30px;}



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
$productName=$_GET["productName"];
//echo $productName;
 $sql="SELECT productNo,price,stock FROM product where productName='$productName'";
 
$result = $conn->query($sql);
if($result->num_rows > 0){

while($row = $result->fetch_assoc()){
      $productNo=$row['productNo'];
	  $price=$row["price"];
	  $stock=$row["stock"];
  }
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
  <a href="SriSelva.php" class="right" >Home</a>
  <a href="stock.php" class="right" style="background-color: #ddd; color: black;">Stock</a>
  
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
  <form method="get" action="modifyProductSuccess.php" ><br><br>
  
  <center><h2>Please fill below details to add a new Product</h2><br><br>
  <table  id="myTable" style="width:50%  ">
  <tr><td><label for="productNo">Product No</label></td>
 <td> <input type="text" name="productNo" value="<?php echo $productNo;?>" readonly></td></tr>
<tr><td><label for="productName">Product Name</label></td>
 <td> <input type="text" name="productName" value="<?php echo $productName;?>" ></td></tr>
  <tr><td><label for="price">Price</label></td>
 <td> <input type="number" name="price"  min="1" value="<?php echo $price;?>"></td></tr>
 <tr> <td><label for="stock">Available Stock</label></td>
  <td><input type="number" name="stock" min="1" value="<?php echo $stock;?>"></td></tr>
 <tr> <td colspan="2"><button type="submit" name="gstPercentage" value="<?php echo $_GET['gstPercentage']; ?>">	
Click here to update the Product</button></tr></center>

</table></form>
  </div>
  </div>



</body>
</html>
