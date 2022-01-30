 <?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sri Selva Ganapathy</title>

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
 $sql="SELECT purchaseDate, billNo, salValue, gst, totValue FROM $tableName where gstPercentage=$gstPercentage and purchaseDate between '$fromDate' and '$toDate'";
 
$result = $conn->query($sql);

$noOfRows= '';
$overallSalValue=0;
$overallgst=0;
$overallTotValue=0;
$pages=$result->num_rows;
$noOfPages=1;
while($pages > 10)
{
	$pages=$pages-10;
	$noOfPages=$noOfPages+1;
}

$i=0;
$sNo=0;
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
		 $i=$i+1;
		 if($i > 10)
		 {
			 $noOfRows.='</table><br><br><br><br><table  id="myTable" style="width:70%  ">
<tr style="background: #ddd;"><th>Sale Date</th><th>Bill No</th><th>Sale Value</th><th>CGST</th><th>SGST</th><th>Total Value</th></tr>';
			$i=0;
		 }
		
	$purchaseDate=date("d-m-Y",strtotime($row['purchaseDate']));
      $noOfRows.='<tr> <td>'.$purchaseDate.'</td><td>'.$row['billNo'].'</td><td>'.$row['salValue'].'</td><td>'.$row['gst'].'</td>
	  <td>'.$row['gst'].'</td><td>'.$row['totValue'].'</td></tr>';
	  $overallSalValue=$overallSalValue+$row['salValue'];
	  $overallgst=$overallgst+$row['gst'];
	  $overallTotValue=$overallTotValue+$row['totValue'];
  }
}
$fromDate=date("d-m-Y",strtotime($fromDate));
$toDate=date("d-m-Y",strtotime($toDate));
//echo $noOfRows;
//$select.='</select>';

?>




  
  <div class="main">
   <center> <h2>CASH/CREDIT BILL</h2>
    <div class="main" style="height:200px;padding:20px;">
	<form method="get" action="newModifyBill.php" >
	<table  style="border: none;"><tr style="border: none;">
  <td style="border: none;"><label for="fromDate">From Date: <?php echo $fromDate; ?></label>
  
  <td style="border: none;"><label for="toDate">From Date: <?php echo $toDate; ?></label>
 
  <td style="border: none;">GST Percentage: <?php echo $_GET['gstPercentage']; ?> </td></tr>
</table><br>


<table  id="myTable" style="width:70%  ">
<tr style="background: #ddd;"><th>Sale Date</th><th>Bill No</th><th>Sale Value</th><th>CGST</th><th>SGST</th><th>Total Value</th></tr>
<?php echo $noOfRows; ?>
<tr style="background: #ddd;  font-weight: bold;" ><td colspan="2">Overall value:</td><td><?php echo $overallSalValue; ?></td>
<td><?php echo $overallgst; ?></td><td><?php echo $overallgst; ?></td><td><?php echo $overallTotValue; ?></td></tr>
</table></center>

   

<?php
$year = date('Y',strtotime($fromDate));
$month = date('F',strtotime($fromDate));
$conn->close();
 ?>

</form>

<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=bill_$gstPercentage%_$year$month.rtf");

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";
//echo "<b>My first document</b>";
echo "</body>";
echo "</html>";
?>
	</div>
</div>



</body>
</html>
