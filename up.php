
<!DOCTYPE html>
<html>
<head>
	<title>queryrun</title>
</head>
<body>
<form action="up.php" method="post">
	enter query: <input type="text" name="sql">
	<input type="submit" name="submit" value="submit">
</form>
</body>
</html>
<?php
include 'dbconfig.php';


$sql = $_POST['sql'];
$submit = $_POST['submit'];
//$sql = "INSERT into faculty(erp,name,email,pswd,verify) VALUES('666','devil','devilhubsdk','6666','1')";


if(!mysqli_query($con, $sql))
{
	echo 'UNSUCCESSFUL QUERY RUN';

}
else
{
	echo 'REGISTRATION SUCCESSFUL, PLEASE WAIT SOME TIME FOR VERIFICATION';
}


$sqlqry = "SELECT * from faculty";
$result = $con->query($sqlqry);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<h1><strong>ERP - NAME - EMAIL - PSWD - VERIFY</strong></h1>";
    while($row = $result->fetch_assoc()) {
        echo "<h1> ". $row["erp"]. "- ". $row["name"]. "- " .$row["email"]. "- " .$row["pswd"]. "- " .$row["verify"] ."<br></h1>";
    }
} else {
    echo "0 results";
}



?>


