<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php include 'css/new9.php';?>
</head>
<body>
    <div class="mac">
    <h2>Reset Password</h2>
    <p>
   <span id="msg">
    </span>
   </p> 
    <form method="POST">
    <div class="input-box">
    <input type="password" name="password" required="">
    <label>Password</label>
    </div>
    <div class="input-box">
    <input type="password" name="cpassword" required="">
    <label>Confirm Password</label>
    </div>
    <input type="submit" name="submit" value="Change Password">
    </form>
    </div>
</body>
</html>
<?php
include 'connectionuju.php';

if(isset($_POST['submit'])){
    if(isset($_GET['token'])){
        $tok = $_GET['token'];
        $pass= mysqli_real_escape_string($con,$_POST['password']);
        $cpass= mysqli_real_escape_string($con,$_POST['cpassword']);

        $npass= password_hash($pass,PASSWORD_BCRYPT);

        $select = "SELECT * FROM register WHERE Token='$tok' ";
        $select_query= mysqli_query($con,$select);
        $count_token = mysqli_num_rows($select_query);
        
        if($count_token){
        if($pass === $cpass){
            $update = "UPDATE register SET Password='$npass' WHERE Token='$tok' ";
            $query_upd = mysqli_query($con,$update);

            if($query_upd){
             ?>
              <script>
              document.getElementById('msg').textContent= "Password Updated!";
              document.getElementById('msg').className= "mssg";
              </script>
             <?php
            }
        }
    }
        else{
            ?>
            <script>
            document.getElementById('msg').textContent= "Unconditional Error Detected!";
            document.getElementById('msg').className= "mssg";
            </script>
           <?php
        }
    }
}
?>