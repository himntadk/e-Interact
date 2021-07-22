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
                <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Teacher Login</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
                    <div class="login-space">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
    <?php
    include '../connectionuju.php';
if(isset($_POST['login'])){
  $lemail = $_POST['lemail'];
  $lpassword = $_POST['lpassword'];
  
  $em_check = "SELECT * FROM teachers WHERE T_Email= '$lemail' ";
  $em_query = mysqli_query($con,$em_check);
  $em_num = mysqli_num_rows($em_query);

  if($em_num){
      $em_pass = mysqli_fetch_assoc($em_query);
      $DB_pass = $em_pass['T_Password'];
      $_SESSION['user']= $em_pass['T_Username'];
      if($DB_pass===$lpassword){
          ?>
          <script>
          alert("Login Successful!");
          location.replace("teacherdisplay.php");
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
                            <div class="group"> <input type="submit" class="button" name="login" value="Log In"> </div>
                            <div class="hr"></div>
                            <div class="foot"> <a href="ResetPass.php">Forgot Password?</a> </div>
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

 
 
     
     
