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
  padding: 12px;
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
$fromDate=$_GET['fromDate'];
$toDate=$_GET['toDate'];
$gstPercentage=$_GET['gstPercentage'];
 $sql="SELECT purchaseDate, billNo, salValue, gst, totValue FROM $tableName where gstPercentage=$gstPercentage and purchaseDate between '$fromDate' and '$toDate' order by billNo";
 
$result = $conn->query($sql);
$noOfRows= '';
$overallSalValue=0;
$overallgst=0;
$overallTotValue=0;
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
	$purchaseDate=date("d-m-Y",strtotime($row['purchaseDate']));
      $noOfRows.='<tr> <td>'.$purchaseDate.'</td><td>'.$row['billNo'].'</td><td>'.$row['salValue'].'</td><td>'.$row['gst'].'</td>
	  <td>'.$row['gst'].'</td><td>'.$row['totValue'].'</td></tr>';
	  $overallSalValue=$overallSalValue+$row['salValue'];
	  $overallgst=$overallgst+$row['gst'];
	  $overallTotValue=$overallTotValue+$row['totValue'];
  }
}
$fromDate=date("d-m-Y",strtotime($fromDate));

//echo $noOfRows;
//$select.='</select>';

?>


<div class="navbar">
  <a href="newSriSelva.php" >New Bill</a>
  <a href="modifyBill.php"  >Modify Bill</a>
  <a href="viewBill.php" style="background-color: #ddd; color: black;">View Bill</a>
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
	<form method="get" action="downloadFile.php" >
	<table  style="border: none;"><tr style="border: none;">
  <td style="border: none;"><label for="fromDate">From Date:</label>
  <input type="date" name="fromDate" value="<?php echo $_GET['fromDate']; ?>" readonly></td>
  <td style="border: none;"><label for="toDate">From Date:</label>
  <input type="date" name="toDate" value="<?php echo $_GET['toDate']; ?>" readonly></td>
  <td style="border: none;">GST Percentage: <input type="text" name="gstPercentage" value="<?php echo $_GET['gstPercentage']; ?>" readonly></td></tr>
</table><br>


<table  id="myTable" style="width:100%  ">
<tr style="background: #ddd;"><th>Sale Date</th><th>Bill No</th><th>Sale Value</th><th>CGST</th><th>SGST</th><th>Total Value</th></tr>
<?php echo $noOfRows; ?>
<tr style="background: #ddd;  font-weight: bold;" ><td colspan="2">Overall value</td><td><?php echo $overallSalValue; ?></td>
<td><?php echo $overallgst; ?></td><td><?php echo $overallgst; ?></td><td><?php echo $overallTotValue; ?></td></tr>
</table>

   

<?php
$conn->close();
 ?>
<br><center>
<button type="submit" name="button1">	
Click here to download as a file</button></center><br><br><br>
</form>


	</div>
    
  </div>
  </div>



</body>
</html>
