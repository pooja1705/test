<?php
include("database.php");
session_start();

//check if user is logged in
if(!isset($_SESSION["user"])){
    header ("location:login.php");
}
$task="";
$user=$_SESSION["user"];
$query=mysqli_query($con,"select * from register where user='$user'");
$rs=mysqli_fetch_array($query);
$id=$rs["id"];

//Add a new task
if(isset($_POST["AddTask"])){

    $task=$_POST["task"];
    $task_description=$_POST["tdescription"];
    $task_date=$_POST["tdate"];
    $image=$_FILES["image"]["name"];
    $target="images/".basename($image);
    if(empty($task)){
        echo "<script> alert('Fill in the task')</script>";
    }else{
        mysqli_query($con,"INSERT into tasks (task,tdescription,tdate,images,userid) values('$task','$task_description','$task_date','$image','$id')");
        
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
            echo "Image uploaded";
        }else{
            echo "please select image";
        }
        header("location:task.php");}

}else if(isset($_POST["update"])){
    mysqli_query($con,"UPDATE tasks Set task='".$_POST['task']."' where id=$modify ");


        }
//Delete a task
if(isset($_GET['delete'])){
        $delete=$_GET['delete'];
        mysqli_query($con,"DELETE from tasks where id=$delete");
        header("location:task.php");
    }
   
//modify a task
 if(isset($_GET['modify'])){
    $modify=$_GET['modify'];
        $q=mysqli_query($con,"select * from tasks where id=$modify");
        while($row=mysqli_fetch_array($q,MYSQLI_ASSOC)){
        $task=$row['task'];}
       
    }

    
 $tasks=mysqli_query($con,"select * from tasks where userid='$id'");

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
    <style type="text/css">
        #img_div{
            width: 5px;
            height: 2px;

        }
    </style>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto" >
                <h1 class="text-primary">TO DO APPLICATION</h1>
                <?php
                echo '<h2>Welcome-'.$_SESSION["user"].'</h2>';
                ?>

                <form method="Post" action="task.php" class="bg-faded"  enctype="multipart/form-data" >

                    <div class="form-group col-md-6">

                        <input type="text" name="task" class="form-control" placeholder="Task Name" value="<?php echo $task?>"/>
                    </div>

                    <div class="form-group col-md-6">
                        <div class='input-group date' id='datetimepicker7'>
                            <input type="text" name="tdate" class="form-control " placeholder="Task Date" >
                            <span class="input-group-addon" >
                                <span class="glyphicon glyphicon-calendar" ></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group  ">

                        <textarea name="tdescription" class="form-control" placeholder="Task description" rows="3"></textarea><br>
                        <input type="file" name="image" value="Browse" >
                        <button type="submit" name="AddTask" class=" btn-primary">ADD task   
                        </button>
                        <button type="submit" name="update" class=" btn-primary">Update
                        <button type="submit" name="logout" class=" btn-primary pull-right">LogOut
                            <?php include("logout.php");?>
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
                            <th>Images</th>
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
                            <td> 
                                <?php
                                if (empty($row['images'])){
                                    echo" ";
                                }else{
                                    echo "<img src='images/".$row['images']." 'width=100px height=100px'  />";
                                }
                                ?>
                                
                           </td>
                           <td><a href="task.php?modify=<?php echo $row['id']?>">Modify</a> | <a href="task.php?delete=<?php echo $row['id']?>">Delete</a></td>
                            
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
