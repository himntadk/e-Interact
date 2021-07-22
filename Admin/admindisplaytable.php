<?php 
session_start();
if(!isset($_SESSION['user']))
{
  header('location: adminlogin.php');
  ?>
 <script>
 alert("You have to log in first!");
 </script>
  <?php
}
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<?php include '../links/links.php'; ?>
<?php include '../css/new.php'; ?>
</head>
<body>
<p>Admin: <?php echo $_SESSION['user'];?></p>
<div class="tab">
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Job Profile</th>
      <th scope="col">Add Question</th>
      <th scope="col">View Question</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="3">Operations</th>
    </tr>
  </thead>
  <tbody>
  <?php
   include '../connectionuju.php';
   $select_data = "SELECT * FROM register ";
   $query = mysqli_query($con, $select_data);
   while($res = mysqli_fetch_array($query)){
       ?>
    <tr>
    <th scope="row"><?php echo $res['Id']; ?></th>
    <td><?php echo $res['Username']; ?></td>
    <td><?php echo $res['Email']; ?></td>
    <td><?php echo $res['Contact']; ?></td>
    <td><?php echo $res['Job_Profile']; ?></td>
    <td style="text-align:center"><a href="adminquestion.php?id=<?php echo $res['Id']; ?> " data-toggle="tooltip" data-placement="bottom" title="Add"><i class="icon-plus"></i></a></td>
    <td style="text-align:center"><a href="viewquestion.php?id=<?php echo $res['Id']; ?> " data-toggle="tooltip" data-placement="bottom" title="View"><i class="icon-question"></a></i></td>
    <td><?php echo $res['Status']; ?></td>
    <td><a href="adminapprove.php?email= <?php echo $res['Email']; ?> " target="_blank" data-toggle="tooltip" data-placement="bottom" title="approve"><i class="icon-ok"></i></a></td>
     <td><a href="reject.php?id=<?php echo $res['Id']; ?> " data-toggle="tooltip" data-placement="bottom" title="reject" ><i class="icon-thumbs-down"></i></a></td>
     <td><a href="remove.php?id=<?php echo $res['Id']; ?> " data-toggle="tooltip" data-placement="bottom" title="remove" ><i class="icon-trash"></i></a></td>
  </tr>
  <?php
   }
  ?>
  </tbody>
</table>
<a href="addteachers.php"><button type="button" class="btn btn-outline-success">Add Teachers</button></a>
<a href="usertable.php"><button type="button" class="btn btn-outline-secondary">Manage Questions</button></a>
<a href="viewresume.php"><button type="button" class="btn btn-outline-danger">View Resume</button></a>
<a href="adminlogout.php"><button type="button" class="btn btn-outline-info">Log Out</button><a>
</div>

</body>
</html>