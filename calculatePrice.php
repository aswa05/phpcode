<?php
session_start();
$regValue = $_GET['fname'];
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

/* $sql="SELECT productNo,productName FROM product";
 
$result = $conn->query($sql);
if($result->num_rows > 0){
$select= '<option value="" disabled selected hidden>Please Choose...</option>';
while($row = $result->fetch_assoc()){
      $select.='<option value="'.$row['productNo'].'">'.$row['productName'].'</option>';
  }
}*/
if(isset($_GET["gst"])){
	
	$gstPercentage=$_GET["gst"];
	if($gstPercentage==5)
	{$gstValue=1.05;}
	elseif($gstPercentage==12)
	{$gstValue=1.12;}
	elseif($gstPercentage==18)
	{$gstValue=1.18;}
	
}
$totalvalue=0;
for($i=1;$i<=5;$i++)
{
	//$i=1;
$price[$i]="";
//echo $_GET["product$i"];
if(isset($_GET["product$i"])){
	$productName=$_GET["product$i"];

	$sql="SELECT price FROM product where productName='$productName'";
	$result = $conn->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		//echo $row['price'];
	$price[$i]=$row['price'];
	//$totalvalue=$totalvalue+$price[$i];
	}
}
}
}
//$gst=(($totalvalue*(0.05)));
//$totalprice=$totalvalue-($gst);
//echo $totalvalue;
//$gst=($totalvalue-($totalvalue/$gstValue))/2;
//$totalprice=$totalvalue-($gst*2);
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
	<form method="get" action="NewBill.php" >
  <label for="fname">Name:</label>
  <input type="text"  name="fname" value="<?php echo $_GET['fname']; ?>" >
   <input type="date" style="float: right;" name="hasta" value='<?php echo $_GET['hasta'];?>'>
 <label for="hasta" style="float: right;"><sub>Date:</sub></label><br><br>
 	<br><label for="fname">Bill No:</label>
  <input type="text" style="color: black;"  name="billNo" value="<?php echo $_GET['billNo']; ?>" readonly>
   
   <input type="text" style="color: black;float: right;"  name="gst" value="<?php echo $_GET['gstPercentage']; ?>" readonly>
   <label for="hasta" style="float: right;"><sub>GST:</sub></label><br>
  <br>
  
<table  id="myTable" style="width:100%  ">
   <th style="width:50px;"> S.No</th><th> Particulars</th><th style="width:100px;"> Qty</th><th style="width:50px;"> Price </th><th style="width:200px;"> Amount(Rs.)</th>
  <tr>    <td>1</td> <td><select name="product1"  ><option><?php if(isset($_GET['product1'])){	echo $_GET['product1']; }else {echo "Please Choose...";}?></option></select></td>
  <td><input type="number" name="quantity1"  style="width:50px; height:20px;" value="<?php if(isset($_GET['quantity1'])){	echo $_GET['quantity1']; }else {echo "";}?>" readonly></td>
  <td><input type="text" name="price1" style="width:100px; height:25px;" value="<?php echo $price[1]; ?>"></td>
  <td></td> </tr>
  
  <tr>    <td>2</td><td> <select name="product2" ><option><?php if(isset($_GET['product2'])){	echo $_GET['product2']; }else {echo "Please Choose...";}?></option></select></td>
  <td><input type="number" name="quantity2" style="width:50px; height:20px;" value="<?php if(isset($_GET['quantity2'])){	echo $_GET['quantity2']; }else {echo "";}?>" readonly></td>
  <td><input type="text" name="price2" style="width:100px; height:25px;" value="<?php echo $price[2]; ?>"></td>
  <td></td>  </tr>
  
  <tr>    <td>3</td><td> <select name="product3" ><option><?php if(isset($_GET['product3'])){	echo $_GET['product3']; }else {echo "Please Choose...";}?></option></select></td>
  <td><input type="number" name="quantity3" style="width:50px; height:20px;" value="<?php if(isset($_GET['quantity3'])){	echo $_GET['quantity3']; }else {echo "";}?>" readonly></td>
  <td><input type="text" name="price3" style="width:100px; height:25px;" value="<?php echo $price[3]; ?>"></td>
  <td></td>  </tr>
  
  <tr>    <td>4</td><td> <select name="product4" ><option><?php if(isset($_GET['product4'])){	echo $_GET['product4']; }else {echo "Please Choose...";}?></option></select></td>
  <td><input type="number" name="quantity4" style="width:50px; height:20px;" value="<?php if(isset($_GET['quantity4'])){	echo $_GET['quantity4']; }else {echo "";}?>" readonly></td>
  <td><input type="text" name="price4" style="width:100px; height:25px;" value="<?php echo $price[4]; ?>"></td>
  <td></td>  </tr>
  
  <tr>    <td>5</td><td> <select name="product5" ><option><?php if(isset($_GET['product5'])){	echo $_GET['product5']; }else {echo "Please Choose...";}?></option></select></td>
  <td><input type="number" name="quantity5" style="width:50px; height:20px;" value="<?php if(isset($_GET['quantity5'])){	echo $_GET['quantity5']; }else {echo "";}?>" readonly></td>
  <td><input type="text" name="price5" style="width:100px; height:25px;" value="<?php echo $price[5]; ?>"></td>
  <td></td>  </tr>
	
  </table>
  
  <br><br>

  
 <br><br><div >
  <center><button type="submit" name="button1">	
Check the Price and click here to get the Amount</button></center></div>
				
   
<?php
$conn->close();
 ?>

</form>


	</div>
    
  </div>
    
  </div>
</body>
</html>
