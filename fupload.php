
<?php 

session_start();
//connection and data ins
include 'dbconfig.php';
if(!mysqli_select_db($con,'testing'))
{
	echo 'Database not selected';
}



$sid = $_POST['sid'];

$year = $_POST['year'];
$psno = $_POST['psno'];



$submitbutton= $_POST['submit'];

$name= $_FILES['file']['name'];

//$where_to_upload= $_POST['where'];

$where_to_upload= $_POST['where'];

$where_to_upload= str_replace(" ", "", $where_to_upload);

$length= strlen($where_to_upload);

$last= substr($where_to_upload, $length-1, 1);

if ($last !== "/"){
$where_to_upload= "$where_to_upload" . "/";
}



$first= substr($where_to_upload, 0, 1);


if ($first == "/"){
$where_to_upload= str_replace("/", "", $where_to_upload);
}

$tmp_name= $_FILES['file']['tmp_name'];




if (isset($name)) {

if (empty($name))
{
echo "Please choose a file";
}
else if (!empty($name))
{
if (move_uploaded_file($tmp_name, $where_to_upload . $name)) {
echo "Uploaded!";
}
}

}



$path = $where_to_upload.$name;	






$uname = $_SESSION['name'];
$utno = $_POST['utno'];
$esyr = $_POST['esyr'];


$dotpos = strpos($name, ".");
$ext = substr($name, $dotpos);
$old = "uploads/$name";
$psn = "ps$psno";
$utn = "ut$utno";
$esn = "es$esyr";

if($psno > 0)
{
	$name = $sid.$psn.$ext;
	$new = "uploads/$name";
}
if($utno > 0) 
{
	$name = $sid.$utn.$ext;
	$new = "uploads/$name";
}
if($esyr > 0)
{
	$name = $sid.$esn.$ext;
	$new = "uploads/$name";
}
rename($old, $new);




$sqlqry = "INSERT into file (sid,year,psno,fname,uname,utno,esyr) VALUES ('$sid','$year','$psno','$name','$uname','$utno','$esyr')";


if(!mysqli_query($con,$sqlqry))
{
	$er = mysqli_error($con);
	echo 'NOT INSERTED';
	echo ' Error message: $er';
}
else
{
	echo 'SUCCESS';
}







if($uname=="admin")
{
header("refresh:2; url=admin.php");	
}
else
{
header("refresh:2; url=faclog.php");
}	
?>







<?php

if  (!empty($name)){
echo "The file you uploaded is shown below.<br><br>";
//echo "<a href='$where_to_upload" ."$name'>$name</a>";
echo "<a href='$path'>file</a>";
echo "<br><br>";

}

?>



