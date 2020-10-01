<?php
session_start();
include 'dbconfig.php';
?>
<html>
<head>

	<title>FACULTY FILE UPLOAD PORTAL</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="img/translogo.png" type="image/icon type">
<link rel="stylesheet" type="text/css" href="css/formstyle.css">


<style type="text/css">
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


<body class="w3-container w3-red" style="padding: 20px;">
<a href="logout.php" float="left" style="float:left;background:white; color: black; padding: 10px; text-decoration: none;">LOGOUT</a><br><br>

<h1 class="w3-center" style="">WELCOME <?php echo $_SESSION['name']; ?>,</h1><br>


<h4 class="w3-center" style="color: black;"><strong>NOTE: FACULTIES ARE REQUESTED TO UPLOAD FILES OF THEIR RESPECTIVE SUBJECTS ONLY.</strong></h4>
	<form  class="w3-center" style="background: black;margin-left: 25%;margin-right: 25%; padding: 50px;"  action="fupload.php" method='post' enctype="multipart/form-data">
		<h1>UPLOAD FILE</h1>
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
  </select></h3> <br></div>

<h3>Institute Test Number:(leave blank if not IT)</h3> 
    	<br><h3><select name="utno">
    		<option value="0">-</option>
    <option value="1">1</option>
    <option value="2">2</option>
  </select></h3> <br></div>

 
<h3>END SEM SESSION (for eg:2017-18,2018-19, etc.) leave blank if not endsem paper:</h3> <input type="text" name="esyr"><br>

 
    	<h3>FILE:</h3> <input type="file" name="file"/><br><br>
 <input class="w3-hide-large w3-hide-medium w3-hide-small" type="text" value="uploads" name="where"/><br><br>
	<input type="submit" name="submit" value="Upload"/>
</form>

</body>
</html>