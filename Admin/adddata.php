<?php
 $con = mysqli_connect('localhost','root');
 mysqli_select_db($con,'uju_project');

 $select = "SELECT * FROM teachers ";
 $query = mysqli_query($con,$select);

 if(mysqli_num_rows($query) > 0){
     while($res = mysqli_fetch_array($query)){
         ?>
           <tr>
           <td><?php echo $res['T_Id'];?></td>
           <td><?php echo $res['T_Username'];?></td>
           <td><?php echo $res['T_Email'];?></td>
           <td><?php echo $res['T_Password'];?></td>
           <td><a href="removeteacher.php?id=<?php echo $res['T_Id']; ?> " data-toggle="tooltip" data-placement="bottom" title="remove" ><i class="icon-trash"></i></a></td>
           </tr>
         <?php
     }
 }
?>