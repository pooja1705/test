<?php
include("database.php");
session_start();

if(isset($_POST["submit"]))
{
	$task=$_POST["task"];
	$tdescription=$_POST["tdescription"];
	$tcreated=$_POST["tcreated"];
	$tdate=$_POST["tdate"];
	if(empty($task)){
		echo "fill in the task";
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
</head>
<body>
<div class="container">
		<div class="row">
			<div class="col-lg-6 m-auto" >
				<h1 class="text-primary">TO DO APPLICATION</h1><br>

<form method="Post" action="task.php" class="bg-faded">

	<div class="form-group">
		
	<input type="text" name="task" class="form-control" placeholder="Task Name" ><br>
	<input type="text" name="tdescription" class="form-control" placeholder="Task description" ><br>
	<label>Created:</label>
	<input type="text" name="tcreated" class="form-control-sm" >
	<label>Task date:</label>
	<input type="text" name="tdate" class="form-control-sm " ><br><br>
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
</body>
</html>