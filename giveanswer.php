<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<?php  include 'css/new4.php';?>
<body>
<div class="mac">
<h1>
  ANSWER FORM
</h1>
    <form method="POST">
    <?php
     include 'connectionuju.php';
     if(isset($_POST['submit'])){
         $qid_arr= $_POST['inspect'];
         $arr = explode(",",$qid_arr);
         $ans= "";
         $update_query= "";
         foreach($arr as $no)
         {  
             if(!empty($no))
             {
                $temp = 'ans-'.$no;
                $ans = $_POST[$temp];
                
                $update= "UPDATE questions SET q_answers='$ans' WHERE q_id='$no' ";
                $update_query = mysqli_query($con,$update);
                
             }
             
         }
     }
     $id= $_GET['id'];
     $select = "SELECT * FROM questions WHERE q_u_id='$id' ";
     $query_sel = mysqli_query($con,$select);
     $q_id="";
     while($res= mysqli_fetch_array($query_sel)){
         ?>
          <p>Question: <?php echo $res['q_questions'];?></p>
         <?php
         $q_id .= $res['q_id'].",";
         if(empty($res['q_answers'])){
            ?>
            <input type="text" class="formStyle" name="<?php echo 'ans-'.$res['q_id'];?>" value="<?php echo $res['q_answers']?>" placeholder="answer">
           <?php  
         }
         else{
            ?>
            <p>Answer:
            <input type="text" readonly name="<?php echo 'ans-'.$res['q_id'];?>" value="<?php echo $res['q_answers'];?>">
            </p>
           <?php 
         }
     }
    ?>
    <input type="hidden" name="inspect" value="<?php echo $q_id;?>">
   <p><button type="submit" name="submit" id="btn_des" class="btn btn-outline-primary">Add Answer</button></p>
    </form>
</div>
<div class="butt">
<a href="Homepk.php"><button type="button" class="btn btn-outline-success">Back</button></a>
</div>
</body>
</html>