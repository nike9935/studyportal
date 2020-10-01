<!DOCTYPE html>
<html lang="en">
<title>STUDY PORTAL SRMU</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/linksizes.css">
<link rel="stylesheet" href="css/searchbox.css">
<link rel="stylesheet" href="css/lists.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="img/translogo.png" type="image/icon type">
<style>



body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
    <a href="ps.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Problem Sets</a>
    <a href="ut.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Institute Tests</a>
    <a href="endsem.html" class="w3-bar-item w3-button w3-padding-large w3-white">End Sem Papers</a>
    <!--<a href="qna.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">QnA</a>-->
    <a href="prev.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Previous Years</a>
    <a href="login.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Faculty Login</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="index.html" class="w3-bar-item w3-button w3-padding-large">Home</a>
    <a href="ps.html" class="w3-bar-item w3-button w3-padding-large">Problem Sets</a>
    <a href="ut.html" class="w3-bar-item w3-button w3-padding-large">Institute Tests</a>
    <a href="endsem.html" class="w3-bar-item w3-button w3-padding-large">End Sem Papers</a>
    <!--<a href="qna.html" class="w3-bar-item w3-button w3-padding-large">QnA</a>-->
    <a href="prev.html" class="w3-bar-item w3-button w3-padding-large">Previous Years</a>
    <a href="login.html" class="w3-bar-item w3-button w3-padding-large">Faculty Login</a>
  </div>
</div>

<!-- Header -->
<!--COURSES-->

<header class="w3-container w3-red" style="padding:128px 16px">
  <div align="center">
    <form action="getes.php" method="post">
    <input type="text" id="mySearch" placeholder="Enter Subject Code(eg: BCS5002)" title="Enter Subject ID" name="sid"><br><br>
    <input type="text" id="mySearch" placeholder="Enter Session(eg: 2017-18, 2018-19)" title="Enter Year" name="esyr">
    <br><br>
    <input type="submit" name="submit" value="Submit">
    </form>
  </div>


<div class="w3-center">
  <br>
  <br>
<?php

include 'dbconfig.php';

$sid = $_POST['sid'];
$esyr = $_POST['esyr'];
$name = "";
$sql = "SELECT fname from file where sid = '$sid' && esyr = '$esyr'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    $name = $row["fname"];
  }
}
else
{
  if($sid == '')
  {
    echo "*Enter sid<br>";
  }
  if($esyr == '0')
  {
    echo "*Enter End Sem Session<br>";
  }
  else
  {
  echo "FILE NOT FOUND<br>";
  }
}


if($name != "")
{
echo '<a class="downadi" target="_blank" href="uploads/'.$name.'">DOWNLOAD End-Sem Paper</a>';
}

?>
</div>



</header>


<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day:Honesty is the best policy</h1>
</div>

<!-- Footer -->





<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

function search()
{
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>

</body>
</html>


