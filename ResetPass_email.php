<!DOCTYPE html>
<html>
<head>
<title>
</title>
<?php include 'css/new1.php';?>
<?php include 'links/links1.php';?>
</head>
<body>
<div class="container forget-password">
            <div class="row">
                <div class="col-md-12 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password here.</p>
                                <form id="register-form" role="form" autocomplete="off" class="form" method="POST">
                                    <div class="form-group">
                                        <p>A verfication mail will be send to your email</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <div id="msg">
                                             
                                            </div>
                                            
                                            <input id="forgetAnswer" name="forgetAnswer" placeholder="Email" class="form-control"  type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="btnForget" class="btn btn-lg btn-primary btn-block btnForget" value="Reset Password" type="submit">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
<?php
include 'connectionuju.php';
if(isset($_POST['btnForget'])){
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
    
    $sub = "Reset Password";
    $body = "Hi $user., click here to reset your password http://localhost/Newproject/reset_password.php?token=".$token;
    $sender= "From: dkvariables@gmail.com";

    if(mail($email,$sub,$body,$sender)){
        ?>
         <script>
         document.getElementById('msg').textContent= "Password recovery link is sent to your email";
         document.getElementById('msg').className= "colo";
         </script>
        <?php
    }
    else{
        ?>
         <script>
         alert("Failed!");
         </script>
        <?php
    }
 }
}
?>