<?php
session_start();
if(!isset($_GET['id'])){
    header('location:teacherlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php include '../links/links.php'; ?>
    <?php include '../css/new6.php';?>
</head>
<body>
   <div class="data">
    <?php
     include '../connectionuju.php';

     $id = $_GET['id'];
     
     $select_name= "SELECT * FROM register WHERE Id = '$id' ";
     $query_name= mysqli_query($con,$select_name);
     $dat= mysqli_fetch_array($query_name);
      ?>
      <p class="head">Questions asked to <?php echo $dat['Username'];?></p>
      <?php
     $select_query= "SELECT * FROM questions WHERE q_u_id= '$id' ";
     $query= mysqli_query($con,$select_query);
     $count = 0;
     while($res= mysqli_fetch_array($query)){
         if(!empty($res['q_questions'])){
             ?>
             <p>Question: <?php echo $res['q_questions'];?></p>
             <?php
             if(!empty($res['q_answers'])){
                ?>
                <p>Answer: <?php echo $res['q_answers'];?>    <span><?php echo $res['q_a_status'];?></span></p>
                <p><a href="markcorrect.php?id=<?php echo $res['q_id']; ?>"><button type="button" class="btn btn-outline-success"><i class="icon-ok"></i> Correct</button></a>
                <a href="markwrong.php?id=<?php echo $res['q_id']; ?>"><button type="button" class="btn btn-outline-danger"><i class="icon-remove"></i>Wrong</button></p></a>
                <?php  
             }
             else{
                $count++;
                ?>
                <p>No Answer Added!</p>
                <?php 
             }
         }
         if(empty($res['q_questions'])){
            ?>
            <script>
            alert("No Question added!");
            </script>
            <?php
         }
     }
     ?>
     <p class="remainder"><?php echo "You haven't answered ".$count." questions!";?></p>
     <?php
    ?>
    </div>
    <div class="butt">
   <a href="teacherdisplay.php"><button type="button" class="btn btn-outline-secondary">Back To Table</button></a>
   </div>
</body>
</html>