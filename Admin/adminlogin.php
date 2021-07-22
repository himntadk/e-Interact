<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include '..\css\new.php'; ?>
<?php include '..\links\links.php';?>
</head>
<body>
<div class="row">
    <div class="col-md-6 mx-auto p-0">
        <div class="card">
            <div class="login-box">
                <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Admin Login</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Register</label>
                    <div class="login-space">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
    <?php
    include '../connectionuju.php';
    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $npassword = password_hash($password, PASSWORD_BCRYPT);
        $ncpassword = password_hash($cpassword, PASSWORD_BCRYPT);

        $email_check = "SELECT * FROM admin_reg WHERE Email = '$email' ";
        $email_query = mysqli_query($con,$email_check);
        $email_num = mysqli_num_rows($email_query);

        if($email_num === 0){
        if($password === $cpassword){
            $insert = "INSERT INTO admin_reg(User, Email, Password) VALUES('$user',
                        '$email','$npassword') ";
            $query = mysqli_query($con,$insert);
            if($query){
                ?>
                <script>
                alert("Inserted!");
                </script>
                <?php
            }
            else{
                ?>
                <script>
                alert("Not Inserted!");
                </script>
                <?php
            }
        }
        else{
            ?>
                <script>
                alert("Type your password carefully!");
                </script>
                <?php
        }
    }
    else{
        ?>
        <script>
        alert("Existing user!💃");
        </script>
        <?php 
    }
}

if(isset($_POST['login'])){
  $lemail = $_POST['lemail'];
  $lpassword = $_POST['lpassword'];
  
  $em_check = "SELECT * FROM admin_reg WHERE Email= '$lemail' ";
  $em_query = mysqli_query($con,$em_check);
  $em_num = mysqli_num_rows($em_query);

  if($em_num){
      $em_pass = mysqli_fetch_assoc($em_query);
      $DB_pass = $em_pass['Password'];
      $_SESSION['user']= $em_pass['User'];
      $pass_decode = password_verify($lpassword,$DB_pass);
      if($pass_decode){
          ?>
          <script>
          alert("Login Successful!");
          location.replace("admindisplaytable.php");
          </script>
          <?php
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
                            <div class="group"> <label for="user" class="label">Username</label> <input id="user" type="text" class="input" placeholder="Enter your email" name="lemail"> </div>
                            <div class="group"> <label for="pass" class="label">Password</label> <input id="pass" type="password" class="input" data-type="password" placeholder="Enter your password" name="lpassword"> </div>
                            <div class="group"> <input id="check" type="checkbox" class="check" checked> <label for="check"><span class="icon"></span> Keep me Signed in</label> </div>
                            <div class="group"><a> <input type="submit" class="button" name="login" value="Log In"> </div>
                            <div class="hr"></div>
                            <div class="foot"> <a href="adminpassreset_email.php">Forgot Password?</a> </div>
                        </div>
                        <div class="sign-up-form">
                            <div class="group"> <label for="user" class="label">Username</label> <input id="user" type="text" class="input" name="user" placeholder= "Enter your username"> </div>
                            <div class="group"> <label for="pass" class="label">Email Address</label> <input id="pass" type="text" class="input" name="email" placeholder=" Enter your email"> </div>
                            <div class="group"> <label for="pass" class="label">Password</label> <input id="pass" type="password" class="input" name="password" placeholder="Create your password" > </div>
                            <div class="group"> <label for="pass" class="label">Repeat Password</label> <input id="pass" type="password" class="input" name="cpassword" placeholder="Repeat your password" > </div>
                            
                            <div class="group"><input type="submit"  class="button" name= "submit" value="Admin Registration"></div>
                            <div class="hr"></div>
                            <div class="foot"> <label for="tab-1">Already Admin?</label> </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="butt">
<a href="../start.php"><button type="button" class="btn btn-outline-success">Back To Table</button></a>
</div>
</body>
</html>

 
 
     
     
