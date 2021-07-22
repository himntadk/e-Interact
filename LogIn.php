<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: LogIn.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'css\new.php'; ?>
<?php include 'links\links.php';?>
</head>
<body>
<div class="row">
    <div class="col-md-6 mx-auto p-0">
        <div class="card">
            <div class="login-box">
                <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                    <div class="login-space">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
    <?php
      include 'connectionuju.php';
       if(isset($_POST['submit'])){

        $id = $_SESSION['id'];
        $user = $_POST['user'];
        $email = $_POST['email'];
        $phno = $_SESSION['contact'];
        $job = $_SESSION['job'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $status = $_SESSION['status'];
        
        $npassword = password_hash($password, PASSWORD_BCRYPT);

       if($password === $cpassword){
           if($status ==="Approved"){
         $update = "UPDATE register SET Id= '$id',Username= '$user', Email='$email',
                Contact = '$phno', Job_Profile='$job', Password='$npassword', Status= '$status'
                WHERE Id='$id' ";
        $update_query= mysqli_query($con,$update);
        if($update_query){
            ?>
            <script>
            alert("signed in! 👍");
            header('location: answer.php');
            </script>
            <?php
        }
        else{
            ?>
            <script>
            alert("Not Upadted!");
            </script>
            <?php
        }
    }
        else{
            ?>
            <script>
            alert("Not Upadted!You are not approved currently!");
            </script>
            <?php
         }
     }
         else{
            ?>
            <script>
            alert("Not Upadted!");
            </script>
            <?php
          }
        }
    if(isset($_POST['login'])){
        $lemail = $_POST['lemail'];
        $lpassword = $_POST['lpassword'];

        $em_check = "SELECT * FROM register WHERE Email= '$lemail' ";
        $em_query = mysqli_query($con,$em_check);
        $em_count = mysqli_num_rows($em_query);
        if($em_count){
            $em_pass = mysqli_fetch_assoc($em_query);
            $dBpass = $em_pass['Password'];
            $_SESSION['user']= $em_pass['Username'];
            $_SESSION['email'] = $em_pass['Email'];
            $_SESSION['contact'] = $em_pass['Contact'];
            $_SESSION['status'] = $em_pass['Status'];
            $_SESSION['id'] = $em_pass['Id'];
            $pass_decode = password_verify($lpassword,$dBpass);
            if($pass_decode){
                if($_SESSION['status'] === "Approved"){
                ?>
                <script>
                alert("Login Successful!");
                location.replace('Homepk.php');
                </script>
                <?php
                }
                else{
                    ?>
                    <script>
                    alert("Login Unsuccessful!You are not approved currently!");
                    </script>
                    <?php   
                }
            }
            else{
                ?>
                <script>
                alert("Login Unsuccessful!");
                </script>
                <?php 
            }
        }

    }
    
?>
   <div class="login">
                            <div class="group"> <label for="user" class="label">User Email</label> <input id="user" type="text" readonly class="input" name="lemail" value="<?php echo $_SESSION['email'];?>" > </div>
                            <div class="group"> <label for="pass" class="label">Password</label> <input id="pass" type="password" class="input" data-type="password" placeholder="Enter your password" name="lpassword"> </div>
                            <div class="group"> <input id="check" type="checkbox" class="check" checked> <label for="check"><span class="icon"></span> Keep me Signed in</label> </div>
                            <div class="group"> <input type="submit" class="button" name="login" value="Log In"> </div>
                            <div class="hr"></div>
                            <div class="foot"> <a href="ResetPass_email.php">Forgot Password?</a> </div>
                        </div>
                        <div class="sign-up-form">
                            <div class="group"> <label for="user" class="label">Username</label> <input id="user" type="text" readonly class="input" name="user" value="<?php echo $_SESSION['user'];?>"> </div>
                            <div class="group"> <label for="pass" class="label">Email Address</label> <input id="pass" type="text" readonly class="input" name="email" value="<?php echo $_SESSION['email'];?>"> </div>
                            <div class="group"> <label for="pass" class="label">Password</label> <input id="pass" type="password" class="input" name="password" placeholder="Create your password" > </div>
                            <div class="group"> <label for="pass" class="label">Repeat Password</label> <input id="pass" type="password" class="input" name="cpassword" placeholder="Repeat your password" > </div>
                            
                            <div class="group"><input type="submit"  class="button" name= "submit" value="Sign In"></div>
                            <div class="hr"></div>
                            <div class="foot"> <label for="tab-1">Already Member?</label> </div>
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

 
 
     
     
