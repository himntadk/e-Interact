<?php
include '../connectionuju.php';

$user = $_POST['t_user'];
$email = $_POST['t_email'];
$password = $_POST['t_pass'];


$select = "SELECT * FROM teachers WHERE T_Email = '$email' ";
$query_select = mysqli_query($con,$select);
$email_count = mysqli_num_rows($query_select);
if($email_count==0){
    $insert = "INSERT INTO teachers (T_Username,T_Email,T_Password) 
    VALUES('$user','$email','$password')";
    $query_insert = mysqli_query($con,$insert);

    if($query_insert){
        echo "Teacher Added!";
    }
    else{
        echo "Teacher could not be added!";
    }
}
else{
    echo "Teacher Exists!";
}
?>