<?php 
session_start();
error_reporting(0);
include("database.php");
if(isset($_POST["Submit"])){

$user=$_POST["user"];
$pass=$_POST["pass"];
$pass=sha1($pass);
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$qn="INSERT into register (user,pass,email,mobile) values ('$user','$pass','$email','$mobile')";
	if(mysqli_query($con,$qn)){
	 echo "<script> alert('Registration done') </script>";
	 header('location:login.php');
	}
 }


?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Here</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	
</head>
 <body>
	
	<div class="container">
		<h1 class="text-primary text-center"> Create an account </h1>
			<div class="col-lg-8  m-auto " >
                <form class="bg-faded" action="signup.php" method="POST" onSubmit="return validation();">
     	           <div class="form-group">
     	           	<label>Username:</label>
	                  <input type="text" name="user" placeholder="Username" id="user" class="form-control">
	                  <span id="username" class="text-danger"></span>
	               </div>
	               <div class="form-group">
	               	<label>Password:</label>
	                   <input type="password" name="pass" placeholder="Create password" id="pass" class="form-control">
		               <span id="password" class="text-danger"></span>
	               </div>
	               <label>Confirm Password:</label>
		           <div class="form-group">
	                   <input type="password" name="cpass" placeholder="Confirm password" id="cpass" class="form-control">
		               <span id="cpassword" class="text-danger"></span>
		           </div>
		           <div class="form-group">
		           	<label>Email:</label>
		               <input type="text" name="email" placeholder="Email address" id="email" class="form-control">
		               <span id="email1" class="text-danger"></span>
		           </div>
		           <div class="form-group">
		           	<label>Mobile:</label>
		               <input type="text" name="mobile"  placeholder="Mobile number" id="mobile" class="form-control">
	                   <span id="mobile1" class="text-danger"></span>
	               </div>
	               <div class="checkbox">
                   <label><input type="checkbox" name="remember"> Remember me</label>
                   </div>
	           <input type="submit" name="Submit" value="Register" class="btn btn-primary">
	 <p><h4>  Already a member? <a href="login.php">Login</a></h4></p>
	</form>

</div>

<script type="text/javascript" > 
	function validation(){
  
			var username =  document.getElementById('user').value;
			var password =  document.getElementById('pass').value;
			var cpassword =  document.getElementById('cpass').value;
			var mobile1 =  document.getElementById('mobile').value;
			var email1 =  document.getElementById('email').value;
			
			if(username==""){
				document.getElementById('username').innerHTML="** Please fill in the username field";
				return false;
			}
			else if(username.length<2 || username.length>10){
				document.getElementById('username').innerHTML="** username must be of valid length";
				return false;
				
			}
			
			else if(password==""){
				document.getElementById('password').innerHTML="** Please fill in the password field";
				return false;
			}

			

			else if(cpassword==""){
				document.getElementById('cpassword').innerHTML="** Please fill in the password field";
				return false;
			}

			else if(cpassword!==password) {
				document.getElementById('cpassword').innerHTML="** Password should be matched";
				return false;
			
			}
            else if(email1==""){
				document.getElementById('email1').innerHTML="** Please fill in the mobile number field";
				return false;
			}
		
			
			else if(mobile1==""){
				document.getElementById('mobile1').innerHTML="** Please fill in the mobile number field";
				return false;

			}
			
	}
		

	</script>
</div>
</body>
</html>
