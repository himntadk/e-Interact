<?php

include '../connectionuju.php';
$id= $_GET['id'];
$status = "Correct";
$update= "UPDATE questions SET q_a_status='$status' WHERE q_id='$id' ";
$query= mysqli_query($con,$update);
 
$select = "SELECT * FROM questions WHERE q_id= '$id' ";
$query_select= mysqli_query($con,$select);
$res = mysqli_fetch_array($query_select);
$ids= $res['q_u_id'];
header('location: checkquestion.php?id='.$ids);
?>