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

$gstPercentage=$_GET['gstPercentage'];
if($gstPercentage == 18)
{$tableName="billDetails";}
 elseif($gstPercentage == 5)
 {$tableName="billdetailsfive";}
 elseif($gstPercentage == 12)
 {$tableName="billdetailstwelve";}

$totalvalue=0;
$billNo=$_GET['billNo'];
$buyerName=$_GET['fname'];
$purchaseDate=$_GET['hasta'];
$gst=$_GET['sgst'];
for($i=1;$i<=5;$i++)
{
$price[$i]= 'NULL';
//echo $_GET["product$i"];
if(isset($_GET["product$i"])){
	$product[$i]=$_GET["product$i"];
	$quantity[$i]=$_GET["quantity$i"];

	$sql="SELECT price FROM product where productName='$product[$i]'";
	$result = $conn->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		//echo $row['price'];
	$price[$i]=$row['price']*$_GET["quantity$i"];
	$totalvalue=$totalvalue+$price[$i];}
}

}
if(empty($quantity[$i]))
{
	$quantity[$i]= 'NULL';
}
if(empty($product[$i]))
{
	$quantity[$i]= 'NULL';
}
}
//echo $quantity[2];
//$gst=(($totalvalue*(0.05)));
//$totalprice=$totalvalue-($gst);
//echo $totalvalue;
//$gst=($totalvalue-($totalvalue/1.05))/2;
$totalprice=$totalvalue-($gst*2);
//$select.='</select>';
$gst=round($gst,2);
$totalprice=round($totalprice,2);
$totalvalue=round($totalvalue,2);

$sql="UPDATE `$tableName` SET `buyerName`='$buyerName',`purchaseDate`='$purchaseDate',`product1`='$product[1]',`product2`='$product[2]',`product3`='$product[3]',`product4`='$product[4]',`product5`='$product[5]',`quantity1`=$quantity[1],`quantity2`=$quantity[2],`quantity3`=$quantity[3],`quantity4`=$quantity[4],`quantity5`=$quantity[5],
`price1`=$price[1],`price2`=$price[2],`price3`=$price[3],`price4`=$price[4],`price5`=$price[5],`salValue`=$totalprice,`gst`=$gst,`totValue`=$totalvalue WHERE billNo=$billNo;";

if ($conn->query($sql) === TRUE) {
  $status="Y";
} else {
	$status="N";
  //echo "Error: " . $sql . "<br>" . $conn->error;
}


?>


<div class="navbar">
  <a href="newSriSelva.php" >New Bill</a>
  <a href="modifyBill.php" style="background-color: #ddd; color: black;">Modify Bill</a>
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
   <center>  <p> <?php 
   if($status=="Y")
   {	
echo '<img src="smile.jpg" style="width:250px; height:250px;"><br><br>';
echo "<h2><b>The Modified bill data successfully updated in database</b></h2><br>
 <a href='modifyBill.php'>Click here to go back to Modify Bill</a>";
}
else
{ 
echo '<img src="sad.jpg" style="width:250px; height:250px;"><br><br>';
echo "<h2><b>Error: " . $sql . "<br>" . $conn->error . "</b></h2><br>
 <a href='modifyBill.php'>Click here to go back to MOdify Bill</a>";
}
?>	</p></center>
   </div>
  </div>
 
  <?php
$conn->close();
 ?>

</body>
</html>
