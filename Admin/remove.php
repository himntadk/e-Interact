<?php
include '../connectionuju.php';
$id = $_GET['id'];
$delete_query = "DELETE FROM register WHERE Id = '$id' ";
$query= mysqli_query($con, $delete_query);
header('location: admindisplaytable.php');
?>