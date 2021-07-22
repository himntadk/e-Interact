<?php
session_start();
if(!isset($_SESSION['user'])){
  header('location:teacherlogin.php');
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
<form method= "POST">
<p>Opened By: <?php echo $_SESSION['user'];?> (teacher)</p>
</form>
<div class="tab">
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Job Profile</th>
      <th scope="col">View Question</th>
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
    <td style="text-align:center"><a href="checkquestion.php?id=<?php echo $res['Id']; ?> " data-toggle="tooltip" data-placement="bottom" title="View"><i class="icon-question"></a></i></td>
  </tr>
  <?php
   }
  ?>
  </tbody>
</table>
</div>
<a href="teacherlogout.php"><button type="button" class="btn btn-outline-info">Log Out</button><a>
</body>
</html>