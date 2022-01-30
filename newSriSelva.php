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
if(isset($_GET["gst"])){
	
	$gstPercentage=$_GET["gst"];
}
 $sql="SELECT productNo,productName FROM product where gstPercentage=$gstPercentage order by productNo";
 $select= '<option value="" selected >Please Choose...</option>';
$result = $conn->query($sql);
if($result->num_rows > 0){

while($row = $result->fetch_assoc()){
      $select.='<option value="'.$row['productName'].'">'.$row['productName'].'</option>';
  }
}
if($gstPercentage == 18)
{$tableName="billDetails";}
 elseif($gstPercentage == 5)
 {$tableName="billdetailsfive";}
 elseif($gstPercentage == 12)
 {$tableName="billdetailstwelve";}
$sql="select max(billNo) from $tableName";
$result = $conn->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$billNo=$row['max(billNo)']+1;
	}
}
else{ $billNo=1; }

//$select.='</select>';

?>


<div class="navbar">
  <a href="newSriSelva.php" style="background-color: #ddd; color: black;">New Bill</a>
  <a href="modifyBill.php">Modify Bill</a>
  <a href="viewBill.php">View Bill</a>
 <a href="SriSelva.php" class="right">Home</a>
  <a href="stock.php" class="right">Stock</a>
  
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
    <h2>CASH/CREDIT BILL</h2>
    <div class="main" style="height:200px;padding:20px;">
	
	
	<form method="get" action="calculatePrice.php" >
  <label for="fname">Name:</label>
  <input type="text" id="fname"  name="fname" >
   <input type="date" style="float: right;" name="hasta" >
 <label for="hasta" style="float: right;"><sub>Date: </sub></label><br><br>
 	<br><label for="fname">Bill No:</label>
  <input type="text" style="color: black;"  name="billNo" value="<?php echo $billNo; ?>" readonly> 
    <input type="text" style="color: black;float: right;"  name="gstPercentage" value="<?php echo $gstPercentage; ?>" readonly>
	<label for="gst"  style="float: right;"><sub>GST Percentage: </sub></label>
	
	<br><br>
<table  id="myTable" style="width:100%  ">
   <th style="width:50px;"> S.No</th><th> Particulars</th><th style="width:100px;"> Qty</th><th style="width:200px;"> Amount(Rs.)</th>
  <tr>    <td>1</td> <td><select name="product1" ><?php echo $select; ?></select></td><td><input type="number" name="quantity1"  style="width:50px; height:20px;"  min="1"></td>
  <td> </td> </tr>
  <tr>    <td>2</td><td> <select name="product2" ><?php echo $select; ?></select></td><td><input type="number" name="quantity2" style="width:50px; height:20px;" min="1"></td>
  <td></td>  </tr>
  <tr>    <td>3</td><td> <select name="product3" ><?php echo $select; ?></select></td><td><input type="number" name="quantity3" style="width:50px; height:20px;" min="1"></td>
  <td></td>  </tr>
  <tr>    <td>4</td><td> <select name="product4" ><?php echo $select; ?></select></td><td><input type="number" name="quantity4" style="width:50px; height:20px;" min="1"></td>
  <td></td>  </tr>
  <tr>    <td>5</td><td> <select name="product5" ><?php echo $select; ?></select></td><td><input type="number" name="quantity5" style="width:50px; height:20px;" min="1"></td>
  <td></td>  </tr>
	
  </table><br><br><div >
  <center><button type="submit" name="button1">	
Click here to calculate the value</button></center></div>
   
<?php
$conn->close();
 ?>

</form>


	</div>
    
  </div>
  </div>



</body>
</html>
