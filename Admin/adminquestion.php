<?php
session_start();
if(!isset($_GET['id'])){
  header('location: adminlogin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>
</title>
<?php  include '../css/new4.php';?>
</head>
<body>
<div class="mac">
<h1>
  QUESTION FORM
</h1>

<div>
  <form method ="POST">
  <?php
  include '../connectionuju.php';
  if(isset($_POST['submit'])){
      $id= $_GET['id'];
      $ques = $_POST['ques'];

      $select_ques= "SELECT * FROM questions WHERE q_questions= '$ques' ";
      $query_sel = mysqli_query($con,$select_ques);
      $count_ques= mysqli_num_rows($query_sel);
      if($count_ques===0){
      $update_query = "INSERT INTO questions (q_u_id,q_questions,q_answers) VALUES
                       ('$id','$ques','')";
      $query = mysqli_query($con, $update_query);
      if(!$query){
          ?>
          <script>
          alert("Question Not Added!");
          </script>
          <?php
      }
    }
    else{
      ?>
          <script>
          alert("Question already exists!💃");
          </script>
          <?php
    }
  }
  ?>
    <table>
      <tbody>
      <?php
        include '../connectionuju.php';
        $ids = $_GET['id'];
        $select_ques= "SELECT * FROM questions WHERE q_u_id= '$ids' ";
        $query_ques= mysqli_query($con,$select_ques);
        $ques_no = mysqli_num_rows($query_ques);
        if($query_ques){
           while( $ques_pass = mysqli_fetch_assoc($query_ques)){
            ?>
            <tr>
            <td>Question: <?php echo $ques_pass['q_questions']; ?>   </td>
            <td>Answer: <?php echo $ques_pass['q_answers']; ?>  </td>
            </tr>
            <?php
           }
        }
      ?>
      </tbody>
    </table>
    <input type="text" name="ques" class="formStyle" placeholder="Question" required />
    <button type="submit" name="submit" id="btn_des" class="btn btn-outline-primary">Add Question</button>
  </form>
</div>
</div>
<div class="butt">
<a href="admindisplaytable.php"><button type="button" class="btn btn-outline-primary">Back To Table</button></a>
</div>
</body>
</html>