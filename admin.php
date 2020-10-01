<?php
session_start();
include 'dbconfig.php';
?>

<!DOCTYPE html>
<html>
<head>

	<title>ADMIN PANEL</title>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="icon" href="img/translogo.png" type="image/icon type">
 <link rel="stylesheet" type="text/css" href="css/loginbox.css">
 <link rel="stylesheet" type="text/css" href="css/regbox.css">
 <link rel="stylesheet" type="text/css" href="css/actionlink.css">




 <style type="text/css">
div.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 0;  
}


	p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}
input{
    width: 100%;
    
}
	input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;

}
input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #fb2525;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
input[type="submit"]:hover
{
    cursor: pointer;
    background: #ffc107;
    color: #000;
}
</style>
</head>


<body  class="w3-container w3-red" style="padding: 20px;">


<h1 class="w3-center">WELCOME <?php echo $_SESSION['name']; ?></h1>

<!--<div class="w3-container sticky w3-black w3-center">-->
<div class="w3-container w3-black sticky" >
<h1 class="w3-center">ADMIN ACTIONS: </h1>
<a href="logout.php" class="actadi" style="background:white !important; color:black !important">LOGOUT</a>
<a href="#displaynew" class="actadi">DISPLAY NEW USERS</a>
<a href="#verifyusers" class="actadi">VERIFY USERS</a>
<a href="#uploadfiles" class="actadi">UPLOAD FILES</a>
<a href="#viewfiles" class="actadi">VIEW FILES IN DB</a>
<a href="#deletefiles" class="actadi">DELETE FILES FROM DB</a>
<a href="#viewusers" class="actadi">VIEW USERS IN DB</a>
<a href="#deleteusers" class="actadi">DELETE USERS FROM DB</a>
<a href="#addusers" class="actadi">ADD USERS TO DB</a>
<a href="#chpass" class="actadi">CHANGE USER's PASSWORD</a>
</div>


<!--display new users to verify-->
<br>
<br>
<h1 id="displaynew"></h1>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h1 style="color: black;"><strong>NEW USERS TO VERIFY:</strong> </h1>
<div style="color: black;">

<?php


$sql = "SELECT * from faculty where verify=0";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<h1><strong>ERP - NAME - EMAIL - VERIFY</strong></h1>";
    while($row = $result->fetch_assoc()) {
        echo "<h1> ". $row["erp"]. "- ". $row["name"]. "- " .$row["email"]. "- " .$row["verify"] ."<br></h1>";
    }
} else {
    echo "0 results";
}
?>

<br>
<!-- end of display new users-->



<!-- verify new users-->
<h1 id= "verifyusers"></h1>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
 <form class="w3-center" style="background: black;margin-left: 25%;margin-right: 25%; padding: 50px;color: white;" action="admin.php" method="post">
 	<h1><strong>VERIFY USERS</strong></h1>
  ERP ID: <input type="text" name="vererp"><br><br>
  <input type="submit" name="submit" value="VERIFY"><br>
<?php
error_reporting(0);
$vererp = $_POST['vererp'];
$verq = "UPDATE faculty SET verify = 1 where erp = '$vererp'";
if(!mysqli_query($con, $verq))
{
	echo 'NOT VERIFIED';

}
else
{
	echo 'VERIFIED';
}
?>

</form>
</div>



<br>
<br>
<!-- end of verify new users-->



<!-- upload files-->
<h1 id= "uploadfiles"></h1>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<form class="w3-center" style="background: black;margin-left: 25%;margin-right: 25%; padding: 50px;"  action="fupload.php" method='post' enctype="multipart/form-data">
		<h1><strong>UPLOAD FILE</strong></h1>
		<h3>Subject ID (for eg: BCS5004):</h3> <input type="text" name="sid"><br>
    	<h3>YEAR (for eg: 1,2,3 or 4):</h3> <input type="text" name="year"><br>

    	<h3>Problem Set Number:(leave blank if not PS)</h3> 
    	<br><h3><select name="psno">
    		<option value="0">-</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select></h3> <br>

<h3>Institute Test Number:(leave blank if not IT)</h3> 
    	<br><h3><select name="utno">
    		<option value="0">-</option>
    <option value="1">1</option>
    <option value="2">2</option>
  </select></h3> <br>

<h3>END SEM SESSION (for eg:2017-18,2018-19, etc) leave blank if not endsem paper:</h3> <input type="text" name="esyr"><br>

 
    	<h3>FILE:</h3> <input type="file" name="file"/><br><br>
 <input class="w3-hide-large w3-hide-medium w3-hide-small" type="text" value="uploads" name="where"/><br><br>
	<input type="submit" name="submit" value="Upload"/>
</form><br>
<br>
<!--end of upload files-->


<!--View files in DB-->

<h1 id= "viewfiles"></h1>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h1 style="color: black;"><strong>FILES IN DB: </strong></h1>
<div style="color: black">
<?php



$sql = "SELECT * from file";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<h1><strong>SID - YEAR - PSNO - FNAME - UNAME - UTNO - ESYR</strong></h1>";
    while($row = $result->fetch_assoc()) {
        echo "<h1> ". $row["sid"]. "- ". $row["year"]. "- " .$row["psno"]. "- " .$row["fname"] . "- " .$row["uname"] . "- " .$row["utno"]. "- ". $row["esyr"]."<br></h1>";
    }
} else {
    echo "0 results";
}
?>

</div>
<br>
<br>
<!--end of VIEW FILES-->




<!--DELETE FILES-->
<h1 id= "deletefiles"></h1>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form class="w3-center" style="background: black;margin-left: 25%;margin-right: 25%; padding: 50px;color: white;" action="admin.php" method="post">

<h1><strong>DELETE FILES FROM DB: </strong></h1>    
  FILE NAME: <input type="text" name="filename"><br><br>
  <input type="submit" name="submit" value="DELETE"><br>
<?php
error_reporting(0);
$filename = $_POST['filename'];
$delq = "DELETE FROM file WHERE fname = '$filename'";
if(!mysqli_query($con, $delq))
{
    echo 'NOT DELETED';

}
else
{
    echo 'DELETED';
}
?>
</form><br>
<br>
<!--end of delete files-->




<!--view users of DB-->
<h1 id= "viewusers"></h1>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h1 style="color: black;"><strong>USERS IN DB: </strong></h1>
<div style="color: black">
<?php

$sql = "SELECT * from faculty";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<h1><strong>ERP - NAME - EMAIL - VERIFY</strong></h1>";
    while($row = $result->fetch_assoc()) {
        echo "<h1> ". $row["erp"]. "- ". $row["name"]. "- " .$row["email"]. "- " .$row["verify"] ."<br></h1>";
    }
} else {
    echo "0 results";
}
?>
</div>
<br>
<br>
<!--end of view users-->

<!--DELETE USERS-->
<h1 id= "deleteusers"></h1>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form class="w3-center" style="background: black;margin-left: 25%;margin-right: 25%; padding: 50px;color: white;" action="admin.php" method="post">

<h1><strong>DELETE USERS FROM DB: </strong></h1>    
  ERP: <input type="text" name="delerp"><br><br>
  <input type="submit" name="submit" value="DELETE"><br>
<?php
$delerp = $_POST['delerp'];
$delerq = "DELETE FROM faculty WHERE erp = '$delerp'";
if(!mysqli_query($con, $delerq))
{
    echo 'NOT DELETED';

}
else
{
    echo 'DELETED';
}
?>
</form>
<br>
<br>
<!--end of delete users in db-->


<!--add users to DB-->
<h1 id= "addusers"></h1>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form class="w3-center" style="background: black;margin-left: 25%;margin-right: 25%; padding: 50px;color: white;" action="admin.php" method="post">

<h1><strong>ADD USERS TO DB: </strong></h1>    
  ERP: <input type="text" name="adderp"><br>
  NAME: <input type="text" name="addname"><br>
  EMAIL: <input type="text" name="addemail"><br>
  PASSWORD: <input type="password" name="addpswd"><br><br>
  <input type="submit" name="submit" value="ADD"><br>

<?php
error_reporting(0);
$adderp = $_POST['adderp'];
$addname = $_POST['addname'];
$addemail = $_POST['addemail'];
$addpswd = $_POST['addpswd'];
$addq = "INSERT into faculty(erp,name,email,pswd,verify) VALUES('$adderp','$addname','$addemail','$addpswd',1)";
if(!mysqli_query($con, $addq))
{
    echo 'NOT ADDED';

}
else
{
    echo 'ADDED';
}
?>

</form>
<br>
<br>
<!-- end of add users-->

<!-- change user password-->
<h1 id= "chpass"></h1>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form class="w3-center" style="background: black;margin-left: 25%;margin-right: 25%; padding: 50px;color: white;" action="admin.php" method="post">

<h1><strong>CHANGE USER's PASSWORD: </strong></h1>    
  ERP: <input type="text" name="cherp"><br>
  NEW PASSWORD: <input type="password" name="chpswd"><br><br>
  <input type="submit" name="submit" value="CHANGE PASSWORD"><br>

<?php
//error_reporting(0);
$cherp = $_POST['cherp'];
$chpswd = $_POST['chpswd'];
$chq = "UPDATE faculty SET pswd = '$chpswd' WHERE erp = '$cherp'";
if(!mysqli_query($con, $chq))
{
    echo 'NOT CHANGED';

}
else
{
    echo 'CHANGED';
}
?>

</form>
<br>
<br>
<!--end of change user password-->




</body>
</html>

