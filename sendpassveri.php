<?php
include 'connectionuju.php';

$email = $_POST['forgetAnswer'];

$select = "SELECT * FROM register WHERE Email='$email' ";
$query = mysqli_query($con,$select);
$count_email = mysqli_num_rows($query);
$res= mysqli_fetch_array($query);
if($count_email){
    $token = bin2hex(random_bytes(15));
    $update= "UPDATE register SET Token = '$token' WHERE Email= '$email' ";
    $query_update= mysqli_query($con,$update);

    $user= $res['Username'];
    $token_get= $res['Token'];
    
    $sub = "Reset Password"
    $body = "Hi $user., click here to reset your password http://localhost/Newproject/reset_password.php?token=$token_get";
    $sender= "From: dkvariables@gmail.com";

    if(mail($email,$sub,$body,$sender)){
        echo "Password recovery link is send to your email";
    }
    else{
        echo "Failed!";
    }
}
?>