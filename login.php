<?php include('header.php');  ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	


<?php  
session_start();
if(isset($_POST['submit']))
{
	$uname=$_POST['luser'];
	$upassword=$_POST['lpassword'];

	 $query="SELECT `username`, 'password' FROM `userregister` WHERE username='$uname' and password='$upassword' ";



	 $sql=mysqli_query($con,$query);
	

	 $val=mysqli_num_rows($sql);
	

	 if($val>0)
	 {

	 	$_SESSION['user_name']=$uname;
	 	echo '<script type="text/javascript">alert("You have Successfully Login");window.location=\'ordernow.php\';</script>';
	 }
	 else{
	 	echo '<script type="text/javascript">alert("User doesnot exist");window.location=\'login.php\';</script>';
	 }

}




?>
		  
		  <nav>
		  <div class="login-box">
		  
		  	<h1 class="anim animated lightSpeedIn">Login User</h1>
		  	<form action="" method="POST">
		  	<input type="text" name="luser" placeholder="Username" required="required">

		  	<input type="Password" name="lpassword" placeholder="Enter Password " required="required">


		  	<input type="Submit" name="submit" value="Login" class="anim animated rollin">


		  	<a href="register.php">New Registration</a>

		  	<p><a href="forgotpass.php">Forgot Password</a></p>
		  	</form>
		  </nav>
		  	</div>
		  </div>
		  <!--Footer -->
<footer class="foot">
	<div>
		<h4 style="font-size: 20px;font-family: 'Underdog', cursive;margin: 0px;
">Created By Admin &copy2019</h4>
	</div>


</footer>
<!-- /Footer-->

</body>
</html>



<?php include('footer.php');  ?>