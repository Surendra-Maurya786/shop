<?php include('header.php');  ?>



<?php

error_reporting(E_ALL & ~ E_NOTICE);
// $con=mysqli_connect("localhost","root","","foodcanteen");


if(isset($_POST['submit']))
{

$user=$_POST['user'];
$email=$_POST['email'];


$fetch="SELECT `username` FROM `userregister` WHERE username='$user'";
$fetch2="SELECT `email` FROM `userregister` WHERE email='$email'";

$val=mysqli_query($con,$fetch);
$val2=mysqli_query($con,$fetch2);

$run=mysqli_num_rows($val);
$run2=mysqli_num_rows($val2);

if($run > 0)
{
	echo '<script type="text/javascript">alert("username is already exist");window.location=\'register.php\';</script>';
}
elseif ($run2 > 0) {
	echo '<script type="text/javascript">alert("email is already exist");window.location=\'register.php\';</script>';
}

else
{
	$name=$_POST['name'];
	$password=$_POST['password'];

$query="INSERT INTO `userregister`(`fullname`, `username`, `password`, `email`) VALUES ('$name','$user','$password','$email')";

$run=mysqli_query($con,$query);

if($run)
{
	echo '<script type="text/javascript">alert("Successfully Register");window.location=\'login.php\';</script>';
}
else
{
	echo "error";
}

}
}



?>




<!DOCTYPE html>
<html>
<head>
	<title>Food Canteen</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/registerstyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico|Underdog" rel="stylesheet">
	<script type="text/javascript" src="registervalidation.js"></script> -->
</head>
<body>
	
<nav>
<div class="register-box">
	<form action="" method="POST">
	<h1 class="header animated lightSpeedIn">New User Registration</h1>
	<input type="text" name="name" placeholder="Enter Full Name" required="required"></br>
	<input type="text" name="user" placeholder="Enter Username" required="required"></br>
	<input type="Password" name="password" placeholder="Enter Password" required="required"></br>
	
	<input type="text" name="email" placeholder="Enter Email id" required="required"></br>

	<input type="submit" name="submit" value="Register" class="btn animated pulse"></br>
</form>
</div>
</nav>
<!--Footer -->
<footer class="foot">
	<div>
		<h4 style="font-size: 20px;font-family: 'Underdog', cursive;margin: 0px;
">Created By Admin &copy2019</h4>
	</div>


</footer>
<!-- /Footer-->
		
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="verification.js"></script>


</body>
</html>