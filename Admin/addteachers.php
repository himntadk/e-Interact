<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
</title>
<?php  include '../css/new7.php';?>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<button id="displaydata" class="btn btn-danger">Display Teachers</button>
    <table class="table table-striped table-bordered text-center" id="contain">
    <thead>
    <th><i class="icon-paper-clip"></i> Id</th>
    <th><i class="icon-user"></i> Name</th>
    <th><i class="icon-envelope"></i> Email</th>
    <th><i class="icon-key"></i> Password</th>
    <th><i class="icon-fire"></i> Operation</th>
    </thead>
    <tbody id="response">
    
    </tbody>
    </table>
<div class="frm">
<div>
<h1 id="info"> </h1>
</div>
  <form method ="POST" id="form-data">
    <h1>Fill Teacher Details</h1>
    <input type="text" id="t_user" name="t_user" class="formStyle" placeholder="Username" required />
    <input type="email" id="t_email" name="t_email" class="formStyle" placeholder="Email" required />
    <input type="password" id="t_pass" name="t_pass" class="formStyle" placeholder="Password" required />
    <button type="submit" name="submit" id="btn_des" class="btn btn-outline-primary">Add Teachers</button>
    </form>
</div>
<div class="butt">
<a href="admindisplaytable.php"><button type="button" class="btn btn-outline-warning">Back To Table</button></a>
</div>
<script>
    $('#displaydata').click(function(){
        $('#contain').toggle();
        $.ajax({
            url: 'adddata.php',
            type: 'post',
            
            success:function(result){
             $('#response').html(result);   
            }
        })
    });

    $(document).ready(function(){
        var form = $('#form-data');
        $('#btn_des').click(function(e){
            e.preventDefault();
            $.ajax({
                method: 'post',
                url: 'insertdata.php',
                data: $('#form-data').serialize(),
                dataType: 'text',

                success: function(result){
                    $('#info').html(result);
                }
            })
        })
    });
    </script>
</body>
</html>