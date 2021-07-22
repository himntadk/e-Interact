<?php

include '../connectionuju.php';
$id = $_GET['id'];
$status = "Rejected";
$reject_query = "UPDATE register SET Status= '$status' WHERE Id = '$id' ";
$query = mysqli_query($con, $reject_query);

header('location: admindisplaytable.php');
?>