<?php 
session_start();
error_reporting(0);
include("database.php");
if(isset($_POST["submit"])){

$user=$_POST["user"];
$pass=$_POST["pass"];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
if(empty ($user))
	{ echo "fill in the field" ;}
else{
$qn="insert  into register (user,pass,email,mobile) values ('$user','$pass','$email','$mobile')";
	mysqli_query($con,$qn);
	 header('location:task.php');
 }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Here</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<script type="text/javascript"></script>
	
</head>
 <body>
	
	<div class="container">
		<h1 class="text-primary text-center"> Create an account </h1>
			<div class="col-lg-8  m-auto " >
                <form class="bg-faded" name="form" action="signup.php" method="POST" onSubmit="return validation();">
     	           <div class="form-group">
     	           	<label>Username:</label>
	                  <input type="text" name="user" placeholder="Username" id="user" class="form-control">
	                  <span id="username" class="text-danger"></span>
	               </div>
	               <div class="form-group">
	               	<label>Password:</label>
	                   <input type="password" placeholder="Create password" id="pass" class="form-control">
		               <span id="password" class="text-danger"></span>
	               </div>
	               <label>Confirm Password:</label>
		           <div class="form-group">
	                   <input type="password" placeholder="Confirm password" id="cpass" class="form-control">
		               <span id="cpassword" class="text-danger"></span>
		           </div>
		           <div class="form-group">
		           	<label>Email:</label>
		               <input type="text"  placeholder="Email address" id="email" class="form-control">
		               <span id="email1" class="text-danger"></span>
		           </div>
		           <div class="form-group">
		           	<label>Mobile:</label>
		               <input type="text"  placeholder="Mobile number" id="mobile" class="form-control">
	                   <span id="mobile1" class="text-danger"></span>
	               </div>
	               <div class="checkbox">
                   <label><input type="checkbox" name="remember"> Remember me</label>
                   </div>
	           <input type="submit" name="submit" value="Register" class="btn btn-primary">
	 <p><h4>  Already a member? <a href="login.php">Login</a><h4></p>
	</form>

</div>

<script type="text/javascript">
  }
			var username =  document.getElementById('user').value;
			var password =  document.getElementById('pass').value;
			var cpassword =  document.getElementById('cpass').value;
			var mobile1 =  document.getElementById('mobile').value;
			var email1 =  document.getElementById('email').value;
			if(username==""){
				document.getElementById('username').innerHTML="** Please fill in the username field";
				return false;
			}
			if(username.length<2 || username.length>10){
				document.getElementById('username').innerHTML="** username must be of valid length";
				return false;
				
			}
			
			if(password==""){
				document.getElementById('password').innerHTML="** Please fill in the password field";
				return false;
			}

			if(password.length<3) {
				document.getElementById('password').innerHTML="** Password should be of min 3 and max 8 character";
				return false;
			}
			if (!(password.pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}") ){
				document.getElementById('password').innerHTML="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" ;
			}

			if(cpassword.length<3||cpassword.length>8) {
				document.getElementById('cpassword').innerHTML="** Password should be of min 3 and max 8 character";
				return false;

			}
			if(!(cpassword==password)) {
				document.getElementById('cpassword').innerHTML="** Parssword should be matched";
				return false;
			
			

			if(cpassword==""){
				document.getElementById('cpassword').innerHTML="** Please fill in the password field";
				return false;
			}
			
			if(mobile1==""){
				document.getElementById('mobile1').innerHTML="** Please fill in the mobile number field";
				return false;

			}
			if(email1==""){
				document.getElementById('email1').innerHTML="** Please fill in the mobile number field";
				return false;
			}
		
	}
		

	</script>
</div>
</body>
</html>
