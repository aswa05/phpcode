<?php
session_start();
if(!isset($_GET["fname"]))
{
//echo "alert('aswa')";
}
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

td {  padding: 10px;
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

$gstPercentage=$_GET['gst'];
if($gstPercentage == 18)
{$tableName="billDetails";}
 elseif($gstPercentage == 5)
 {$tableName="billdetailsfive";}
 elseif($gstPercentage == 12)
 {$tableName="billdetailstwelve";}
 
 $sql="SELECT productNo,productName FROM product where gstPercentage=$gstPercentage order by productNo";
 
$result = $conn->query($sql);
if($result->num_rows > 0){
$select= '<option value="" selected >Please Choose...</option>';
while($row = $result->fetch_assoc()){
      $select.='<option value="'.$row['productName'].'">'.$row['productName'].'</option>';
  }
}

$sql="select max(billNo) from $tableName";
$result = $conn->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$billNo=$row['max(billNo)']+1;
	}
}
else{ $billNo=1; }
if(isset($_GET["billNo"]))
{
	$billNo=$_GET["billNo"];
	$sql="select * from $tableName where billNo=$billNo";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$buyerName=$row['buyerName'];
			$purchaseDate=$row['purchaseDate'];
			//echo $row['quantity5'];
			for($i=1;$i<=5;$i++)
			{
				$product[$i]=$row["product$i"];
				$quantity[$i]=$row["quantity$i"];
				$price[$i]=$row["price$i"];
			}
			$salValue=$row['salValue'];
			$gst=$row['gst'];
			$totValue=$row['totValue'];
		
		}
	}

}
//$select.='</select>';

?>


<div class="navbar">
  <a href="newSriSelva.php">New Bill</a>
  <a href="modifyBill.php" style="background-color: #ddd; color: black;">Modify Bill</a>
  <a href="viewBill.php">View Bill</a>
 <a href="SriSelva.php" class="right">Home</a>
  <a href="stock.php" class="right">Stock</a>
  
</div>

<div class="row">
  <div class="side">
<table>
<tr><td>BillNo</td><td><?php echo $billNo; ?></td></tr>
<tr><td>BuyerName</td><td><?php echo $buyerName; ?></td></tr>
<tr><td>Date</td><td><?php echo $purchaseDate; ?></td></tr>
<tr><td>Products</td><td>Quantity</td><td>Price</td></tr>
<tr><td><?php echo "$product[1]<br>$product[2]<br>$product[3]<br>$product[4]<br>$product[5]"; ?></td>
	<td><?php echo "$quantity[1]<br>$quantity[2]<br>$quantity[3]<br>$quantity[4]<br>$quantity[5]"; ?></td>
	<td><?php echo "$price[1]<br>$price[2]<br>$price[3]<br>$price[4]<br>$price[5]"; ?></td></tr>
<tr><td colspan="2">Sale Price</td><td><?php echo $salValue; ?></td></tr>
<tr><td colspan="2">SGST</td><td><?php echo $gst; ?></td></tr>
<tr><td colspan="2">CGST</td><td><?php echo $gst; ?></td></tr>
<tr><td colspan="2">Total Value</td><td><?php echo $totValue; ?></td></tr>
</table>

  </div>
  <div class="main">
    <h2>CASH/CREDIT BILL</h2>
    <div class="main" style="height:200px;padding:20px;">
	<form method="get" action="updateModifyBill.php" >
	 <label for="fname">Name:</label>
  <input type="text" id="fname"  name="fname" >
   <input type="date" style="float: right;" name="hasta" >
 <label for="hasta" style="float: right;"><sub>Date:</sub></label><br><br>
 	<br>
  <label for="billNo">Bill No:</label>
  <input type="number" name="billNo" value="<?php if(isset($_GET["billNo"]))
{
	echo $_GET["billNo"];
}else{ echo ''; }?>" readonly> 
  <input type="text" style="color: black;float: right;"  name="gstPercentage" value="<?php echo $gstPercentage; ?>" readonly>
	<label for="gst"  style="float: right;"><sub>GST Percentage: </sub></label>
	<br><br>
   <table  id="myTable" style="width:100%  ">
   <th style="width:50px;"> S.No</th><th> Particulars</th><th style="width:100px;"> Qty</th><th style="width:200px;"> Amount(Rs.)</th>
  <tr>    <td>1</td> <td><select name="product1" ><?php echo $select; ?></select></td><td><input type="number" name="quantity1"  style="width:50px; height:20px;"  ></td>
  <td><input type="text" name="price1" style="width:100px; height:25px;" ></td> </tr>
  <tr>    <td>2</td><td> <select name="product2" ><?php echo $select; ?></select></td><td><input type="number" name="quantity2" style="width:50px; height:20px;" ></td>
  <td><input type="text" name="price2" style="width:100px; height:25px;" ></td>  </tr>
  <tr>    <td>3</td><td> <select name="product3" ><?php echo $select; ?></select></td><td><input type="number" name="quantity3" style="width:50px; height:20px;" ></td>
  <td><input type="text" name="price3" style="width:100px; height:25px;" ></td>  </tr>
  <tr>    <td>4</td><td> <select name="product4" ><?php echo $select; ?></select></td><td><input type="number" name="quantity4" style="width:50px; height:20px;" ></td>
  <td><input type="text" name="price4" style="width:100px; height:25px;" ></td>  </tr>
  <tr>    <td>5</td><td> <select name="product5" ><?php echo $select; ?></select></td><td><input type="number" name="quantity5" style="width:50px; height:20px;" ></td>
  <td><input type="text" name="price5" style="width:100px; height:25px;" ></td>  </tr>
	
  </table><br><br><div >
  <center><button type="submit" name="button1">	
Click here to calculate the value</button></center></div><br><br>
<?php
$conn->close();
 ?>

</form>


	</div>
    
  </div>
  </div>



</body>
</html>
