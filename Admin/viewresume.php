<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Resume</title>
    <style media="screen">
    *{
        padding:0;
        margin:0;
        top:0;
        bottom:0;
    }
    body{
        background: rgb(3, 85, 78);
        margin:0;
        padding:0;
    }
    .resume{
       text-align:center; 
       margin-top: 20px;
    }
    .resume p{
        margin-top: 20px;
        font-family: sans-serif;
        font-size: 1.2em;
        color:rgb(199, 230, 240);
    }
    .resume h2{
        margin-top: 20px;
        font-family: sans-serif;
        font-size: 2em;
        color:rgb(199, 230, 240);
        padding:15px;
        margin-left:90px;
    }
    embed{
       padding:10px;
       border: 2px solid black; 
    }
    button{
        width: 150px;
        height:50px;
        float: right;
        padding-right: 10px;
        margin-right:10px;
        border: 2px solid black;
        background: rgb(3, 85, 78);
        border-radius: 6px;
        font-size: 1.2em;
    }
    button:hover{
        background:rgba(0,0,0,0.8); 
        box-shadow:0 15px 25px rgba(0,0,0,0.5);
        color:rgb(168, 178, 235);
    }
    </style>
</head>
<body>
    <div class="resume">
    <a href="admindisplaytable.php"><button type="button" class="btn btn-outline-dark">Back</button></a>
    <h2>Resume</h2>
    <?php
     include '../connectionuju.php';
     $display = "SELECT * FROM register ";
     $query = mysqli_query($con,$display);
     while($res= mysqli_fetch_array($query)){
         if(!empty($res['Resume'])){
         ?>
          <p><?php echo $res['Username'];?></p>
          <p><?php echo $res['Email'];?></p>
          <p>
          <embed src="resume/<?php echo $res['Resume'];?>" type="application/pdf" width="900" height="500">
          </p>
         <?php
         }
     }
    ?>
    </div>
</body>
</html>