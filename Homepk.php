<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: LogIn.php');
    ?>
      <script>
          alert("You are Logged Out!😢");
      </script>
    <?php
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <?php include 'css/new2.php';?>
        <?php include 'links/links.php';?>
    </head>
    <body>
    <form method="POST">
     <div class="data">
        <p>Name: <?php echo $_SESSION['user'];?></p>
        <p>Email: <?php echo $_SESSION['email'];?></p>
        <p>Contact Number: <?php echo $_SESSION['contact'];?></p>
        <button type="submit" class="btn btn-outline-secondary" name="submit">Log Out</button>
        <a href="giveanswer.php?id=<?php echo $_SESSION['id'];?> "><button type="button" class="btn btn-outline-success">Question</button></a>
       <div class="info">
        <p>Click the Question button to answer the question<p>
        <p>asked by user. Otherwise you will be rejected!</p>
        </div>
    </div>
    </form>
    </body>
</html>
<?php
if(isset($_POST['submit'])){
header('location: LogIn.php');
}
?>