<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<?php include '../links/links1.php'; ?>
<?php include '../css/new.php'; ?>
</head>
<body>
<div class="tab">
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col"><i class="icon-paper-clip"></i> Id</th>
      <th scope="col"><i class="icon-info-sign"></i> Question Id</th>
      <th scope="col"><i class="icon-question"></i> Question</th>
      <th scope="col"><i class="icon-lightbulb"></i> Answer</th>
      <th scope="col" colspan="3"><i class="icon-fire"></i> Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php
   include '../connectionuju.php';
   $select_data = "SELECT * FROM questions ";
   $query = mysqli_query($con, $select_data);
   while($res = mysqli_fetch_array($query)){
       ?>
    <tr>
    <th scope="row"><?php echo $res['q_id']; ?></th>
    <td><?php echo $res['q_u_id']; ?></td>
    <td><?php echo $res['q_questions']; ?></td>
    <td><?php echo $res['q_answers']; ?></td>
    <td ><a href="remove_ques.php?id= <?php echo $res['q_id']; ?> " data-toggle="tooltip" data-placement="bottom" title="remove question" ><i class="icon-trash"></i></a>
     <a href="remove_ans.php?id= <?php echo $res['q_id']; ?> " data-toggle="tooltip" data-placement="top" title="remove answer" ><i class="icon-trash"></i></a>
    <a href="remove_qid.php?id= <?php echo $res['q_id']; ?> " data-toggle="tooltip" data-placement="top" title="remove question Id" ><i class="icon-trash"></i></a></td>
  </tr>
  <?php
   }
  ?>
  </tbody>
</table>
</div>
<div class="butt">
<a href="admindisplaytable.php"><button type="button" class="btn btn-outline-secondary">Back To Home Table</button></a>
</div>
</body>
</html>