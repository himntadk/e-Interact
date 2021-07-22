<?php
include '../connectionuju.php';
$id = $_GET['id'];
$delete_query = "DELETE FROM teachers WHERE T_Id = '$id' ";
$query= mysqli_query($con, $delete_query);
header('location: addteachers.php');
?>