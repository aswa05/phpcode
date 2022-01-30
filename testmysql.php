
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
}
th, td {
  padding: 20px;
}
.btn {
  border: none;
  background-color: inherit;
  padding: 22px 28px;
  font-size: 20px;
  cursor: pointer;
  display: inline-block;
}
/* On mouse-over */
.btn:hover {background: #eee;}

.success {color: black;}
.bg {
  /* The image used */
  background-image: url("bgimage2.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
  </head>
<body><div class="bg"><br><center><img src="bgimage3.jpg" alt="Italian Trulli"></center>
<table style="width:100%">
 <tr>  <td> <button class="btn success">  New Bill </button> </td></tr>
  <tr>    <td><button class="btn success"> Edit Bill</button> </td>  </tr>
  <tr>    <td><button class="btn success"> View Bill</button> </td>  </tr>
</table>
<p> <center>Welcome </center></p>
</div>
<?php

$mysqli = new mysqli('127.0.0.1', 'root', '', '');
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$mysqli->close();
?>
</body></html>