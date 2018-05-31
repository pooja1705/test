<?php 
session_start();
if(isset($_SESSION["user"]))
{
	header ("location:task.php");
}

error_reporting(0);
include("database.php");
if(isset($_POST["login"])){
	if(empty($_POST["user"]) && empty($_POST['pass']))
	{
		echo '<script> alert("Both fields are required") </script>';
	}
	else {
	$user=$_POST["user"];
    $pass=$_POST['pass'];
    $pass=sha1($pass);
    $q="SELECT * from register where user='$user' && pass='$pass'";
    $result=mysqli_query($con,$q);
    $ql=mysqli_num_rows($result);

if($ql>0){
	$_SESSION['user']=$user;
	header("location:task.php");
}
else{
	echo "<script> alert('User not registered') </script>";
	//header('location:signup.php');
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>

	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 m-auto" >
				<h2 class="text-primary">If already registered,please login</h2>
				<form action="login.php" method="POST" class="bg-faded">
					<div class="form-group">
						<div>
							<label>Username</label>
						    <input type="text" name="user" class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
						    <input type="password" name="pass" class="form-control">
						</div>

							<input type="submit" class=" btn btn-primary" name="login" value="Login">
						Not yet member? <a href="signup.php">Register here
					</div>
				</form>
			</div>
</body>
</html>
