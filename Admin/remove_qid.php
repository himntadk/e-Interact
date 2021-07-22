<?php
include '../connectionuju.php';
$id = $_GET['id'];
$delete_query = "DELETE FROM questions WHERE q_id = '$id' ";
$query= mysqli_query($con, $delete_query);
header('location: usertable.php');
?>