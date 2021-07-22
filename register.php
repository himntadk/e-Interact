<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<?php include 'css\new.php'; ?>
<?php include 'links\links.php';?>
<style media="screen">
.login-box{
    min-height: 700;
}
</style>
</head>
<body>
<div class="row">
    <div class="col-md-6 mx-auto p-0">
        <div class="card">
            <div class="login-box">
                <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">About</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Register</label>
                    <div class="login-space">
                    <form method="POST" enctype= "multipart/form-data">
                        <div class="sign-up-form">
                            <div class="group"> <label for="user" class="label">Username</label> <input id="user" type="search" class="input" placeholder="Create your Username" name="user" required=""> </div>
                            <div class="group"> <label for="pass" class="label">Email Address</label> <input id="pass" type="text" class="input" placeholder="Enter your email address" name="email" required=""> </div>
                            <div class="group"> <label for="pass" class="label">Contact Number</label> <input id="pass" type="tel" class="input" data-type="tel" placeholder="Enter your contact number" name="contact" required=""> </div>
                            <div class="group"> <label for="pass" class="label">Job Profile</label> <input id="pass" type="search" class="input" data-type="text" list="Job Profile" placeholder="Job Profile" name="job" required="">
                             <datalist id="Job Profile">
                                 <option value="Programmer">
                                 <option value="Designer">
                                 <option value="Business Manager">
                             </datalist>            
                        </div>
                        <div class="group"> <label for="pass" class="label">Resume</label> <input id="pass" type="file" class="input" name="pdf" required=""> </div>
                            <div class="group"> <input type="submit" class="button" name="submit" value="Register"> </div>
                            <div class="hr"></div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="butt">
<a href="start.php"><button type="button" class="btn btn-outline-success">Back To Table</button></a>
</div>
</body>
</html>       
<?php
include 'connectionuju.php';
if(isset($_POST['submit'])){
   $user = $_POST['user'];
   $email = $_POST['email'];
   $contact = $_POST['contact'];
   $job = $_POST['job'];
   $status= "Not Visited";

   $pdf= $_FILES['pdf']['name'];
   $pdf_type = $_FILES['pdf']['type'];
   $pdf_size = $_FILES['pdf']['size'];
   $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
   $pdf_store = "Admin/resume/".$pdf;

   move_uploaded_file($pdf_tem_loc,$pdf_store);
   
   if($email !== NULL){
       $email_check = "SELECT * FROM register WHERE Email = '$email' ";
       $query = mysqli_query($con,$email_check);
       $email_count = mysqli_num_rows($query);
       if($email_count > 0){
           ?>
           <script>
            alert("Email Already Exists!💃");
        </script>
           <?php
       }
       else{
           $insert_data = "INSERT INTO register(Username, Email, Contact, Job_Profile, Resume, Password,Status) 
                           VALUES('$user','$email','$contact','$job','$pdf','','$status')";
           $res = mysqli_query($con,$insert_data);
           if($res){
            ?>
            <script>
                alert("Data Inserted Successfully!😃");
            </script>
            <?php
           }
           else{
            ?>
            <script>
                alert("Data Insertion Failed!😢");
            </script>
            <?php
           } 
       }
   }
}
?>
  
  
  
  
  
  