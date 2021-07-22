<?php
session_start();
/*if(isset($_SESSION['user'])){
    header('location: displaytable.php');
}*/
?>

<!DOCTYPE html>
<html>
<head>
<title>

</title>
<?php include '../css\new.php'; ?>
<?php include '../links\links.php';?>
</head>
<body>
<div class="row">
    <div class="col-md-6 mx-auto p-0">
        <div class="card">
            <div class="login-box">
                <div class="login-snip"> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Approval Mail</label>
                    <div class="login-space">
                    <form method="POST">
                        <div class="sign-up-form">
                            <div class="group"> <label for="user" class="label">To</label> <input id="user" type="email" readonly class="input" name="email" value="<?php echo $_GET['email']; ?> "> </div>
                            <div class="group"> <label for="pass" class="label">Subject</label> <input id="pass" type="text" class="input" placeholder="Enter the subject of your mail" name="sub" > </div>
                            <div class="group"> <label for="pass" class="label">Body</label> <input id="pass" type="tel" class="input" data-type="tel" placeholder="Enter the body of your mail" name="body" > </div>
                            <div class="group"> <label for="pass" class="label">Link</label> <input id="pass" type="search" readonly class="input" data-type="text" list="Job Profile" name="link" value="http://localhost/Newproject/LogIn.php" >
                            </div>
                            <div class="group"> <input type="submit" class="button" name="submit" value ="Send"> </div>
                            <div class="hr"></div>
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
include '../connectionuju.php';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $status= "Approved";
    $update_query = "UPDATE register SET Status= '$status' WHERE Email= '$email' ";
    $up_query= mysqli_query($con,$update_query);

    $select = "SELECT * FROM register WHERE Email = '$email' ";
    $query = mysqli_query($con , $select);

    $email_count = mysqli_num_rows($query);
    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        $_SESSION['email'] = $email_pass['Email'];
        $_SESSION['user'] = $email_pass['Username'];
        $_SESSION['id'] = $email_pass['Id'];
        $_SESSION['contact'] = $email_pass['Contact'];
        $_SESSION['job'] = $email_pass['Job_Profile'];
        $_SESSION['status'] = $email_pass['Status'];
        $_SESSION['ques'] = $email_pass['Question'];
    }
    $sub = $_POST['sub'];
    $body = $_POST['body']. $_POST['link'];
    $sender = "From: dkvariables@gmail.com";

    if(mail($email,$sub,$body,$sender)){
        echo "sent!";
        ?>
         <script>
         location.replace("../LogIn.php");
         </script>
        <?php
    }
    else{
        echo "Not Sent!";
    }
}
?>