 <?php

session_start();
include 'dbconfig.php';

$erp = $_POST['erp'];
$pswd = $_POST['pswd'];
$sub = $_POST['submit'];

$sql = "SELECT * from faculty where erp = '$erp' && pswd = '$pswd' && verify=1";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);






if($num == 1)
{

	$s = "SELECT name from faculty where erp = $erp";
	$r = $con->query($s);
	$n = $r->fetch_assoc();
	$name = $n["name"];
	$_SESSION['name'] = $name;
	if($name == 'admin')
	{
		header('location:admin.php');
	}
	else{
	header('location:faclog.php');	
	}
	

}

else
{ 
	header('location:login.html');
	//header('location:login.php');
}

 ?>