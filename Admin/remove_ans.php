<?php
include '../connectionuju.php';
$id= $_GET['id'];
$delete_query= "UPDATE questions SET  q_answers= Null WHERE q_id='$id' ";
$query= mysqli_query($con,$delete_query);
header('location: usertable.php');
?>