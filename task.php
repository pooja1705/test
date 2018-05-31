<?php
include("database.php");
session_start();
if(!isset($_SESSION["user"]))
{
	header ("location:login.php");
}

if(isset($_POST["submit"]))
{
	$task=$_POST["task"];
	$tdescription=$_POST["tdescription"];
	$tcreated=date('d-M');
	$tdate=$_POST["tdate"];
	if(empty($task)){
		echo "<script> alert('Fill in the task')</script>";
	}else{
	mysqli_query($con,"INSERT into tasks (task,tdescription,tcreated,tdate) values('$task','$tdescription','$tcreated','$tdate')");
	header("location:task.php");}
}
if(isset($_GET['delete'])){
	$delete=$_GET['delete'];
	mysqli_query($con,"DELETE from tasks where id=$delete");
	header("location:task.php");
}
	
$tasks=mysqli_query($con,"select * from tasks");

?>

<!DOCTYPE html>
<html>
<head>
	<title>tasks</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

	
</head>
<body>
<div class="container">
		<div class="row">
			<div class="col-lg-6 m-auto" >
				<h1 class="text-primary">TO DO APPLICATION</h1><br>
				<?php
				echo '<h2>Welcome-'.$_SESSION["user"].'</h2>';
				?>

<form method="Post" action="task.php" class="bg-faded">

	<div class="form-group">
		
	<input type="text" name="task" class="form-control" placeholder="Task Name" ><br>
	<input type="text" name="tdescription" class="form-control" placeholder="Task description" ><br>
	<label>Task date:</label>
	<div class='input-group date' id='datetimepicker7'>
         <input type="text" name="tdate" class="form-control " >
              <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
                </span>
    </div>
    <button type="submit" name="submit" class=" btn-primary">ADD task
	</button>
</div>


</form>
<table class="table">
	<thead>
		<tr>
			<th>S.No</th>
			<th>Task</th>
			<th>Description</th>
			<th>Created</th>
			<th>To be done</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1;
		while ($row=mysqli_fetch_array($tasks)) { ?>
		
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['task'];?></td>
			<td><?php echo $row['tdescription'];?></td>
			<td><?php echo $row['tcreated'];?></td>
			<td><?php echo $row['tdate'];?></td>
			<td><a href="task.php?delete=<?php echo $row['id']?>">Delete</a></td>
		</tr>
		
		<?php $i++; } ?>
	</tbody>
			
		</tr>
	</thead>
</table></div>

</div>
<script type="text/javascript">
$(document).ready(function() {
        
            $('#datetimepicker7').datetimepicker();
            
            
            });
       
    
</script>



</body>
</html>
