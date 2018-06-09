<?php
// store all these first into variables and then use
// $host = 'localhost';
// $user = 'root';
// $pass = 'use-password-if-any';
// $db   = 'todo_list';

// make a connection and check if connection failed then throw error , so that user cannot use app further

// try {
//  $conn = mysqli_connect ($host, $user, $pass, $db);
// }catch (Exception $e){
//  print_r($e);
//  die();
// }

$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'todo_list');
?>
