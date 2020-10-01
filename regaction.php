

<?php
include 'dbconfig.php';

$erp = $_POST['erp'];
$name = $_POST['name'];
$email = $_POST['email'];
$pswd = $_POST['pswd'];
$submit = $_POST['submit'];

$sql = "INSERT into faculty(erp,name,email,pswd) VALUES('$erp','$name','$email','$pswd')";

//$result = mysqli_querry($con, $sql);

if(!mysqli_query($con, $sql))
{
	echo 'UNSUCCESSFUL ERP ID ALREADY TAKEN';

}
else
{
	echo 'REGISTRATION SUCCESSFUL, PLEASE WAIT SOME TIME FOR VERIFICATION';
}

header("refresh:5; url=login.html");


?>


