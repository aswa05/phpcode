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
  border: none;
  border-collapse: collapse;
}
select, option { text-align-last:center; 
font-size: 17px;
width:400px; height:30px;}



</style>

</head>
<body>

<div class="header">
  <h1>Sri Selva Ganapathy Store</h1>
  <p>Fertilizer and Pesticide retailer</p>
</div>



<div class="navbar">
  <a href="newSriSelva.php" >New Bill</a>
  <a href="modifyBill.php">Modify Bill</a>
  <a href="viewBill.php">View Bill</a>
  <a href="SriSelva.php" class="right" style="background-color: #ddd; color: black;">Home</a>
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
 <center><img src="smile.jpg" style="width:250px; height:250px;"><br><br><p><b> Welcome Jayasankar !!!</b></p>
 <form method="get" action="newSriSelva.php" >
 <table  id="myTabl" style="width:50%  ">
 <tr><td><label for="gst"  ><sub>GST Percentage: </sub></label></td>
 <td><select name="gst" style=" width:200px; height:30px;"><option value="5">5</option><option value="12">12</option><option value="18">18</option></select></td>
	
	<tr><td colspan=2><button type="submit" name="button1">	
Click here to enter a new bill</button></td></tr>
  </table></form></center>
  </div>
  </div>



</body>
</html>
