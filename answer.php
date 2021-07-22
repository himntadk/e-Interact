<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
</title>
<?php  include 'css/new4.php';?>
</head>
<body>
<form method="POST">
<?php
include 'connectionuju.php';
$ans_arr = (array) null;
$ques_no="";
if(isset($_POST['submit']))
{
  $ques_no = $_POST['inspect'];
  
  $arr = explode(",",$ques_no);

  $ans = "";

  foreach($arr as $no)
  {
  /* $upadate_query = "UPDATE questions SET q_answers= '$ans_arr[$no]' WHERE q_id = '$no' ";
  $query= mysqli_query($con,$upadate_query); */
    //echo $no."<br>";

    $q_no = $no;
    $temp = "ans-".$no;
    $ans = $_POST[$temp];

    echo "q no-".$q_no.", ans -".$ans."<br>";

  }
}
$id = $_GET['id'];
$select_ques= "SELECT * FROM questions WHERE q_u_id='$id' ";
$query_ques= mysqli_query($con,$select_ques);
$q_id = "";

while($res= mysqli_fetch_array($query_ques)){
  ?>
   <h3><?php echo $res['q_questions'];?></h3>
  <?php
  if(empty($res['q_answers'])){

    $q_id .= $res['q_id'].",";
    ?>
    <input type="text" name="<?php echo "ans-".$res['q_id']; ?>" value="<?php echo $res['q_answers'] ?>" placeholder="answer">
    <input type="text" name="himanta">
    <?php
  }
  else{
    ?>
    <input type="text" value= "<?php echo $res['q_answers'];?>">
    <?php
  }
}
?>

<input type="text" name ="inspect" value="<?php echo $q_id; ?>">

<input type="submit" name="submit" value="submit">
</form>
<h3>Id: <?php echo $_GET['id'];?></h3>
</body>
</html>