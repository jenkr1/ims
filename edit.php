<!DOCTYPE html>
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<?php 

include "connection.php";
$id=$_GET["id"];

$username="";
$password="";
$email="";
$contact="";


$res=mysqli_query($link, "select * from table1 where id=$id");
while($row=mysqli_fetch_array($res)){
$username=$row["username"];
$password=$row["password"];
$email=$row["email"];
$contact=$row["contact"];
}




?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-lg-4">
  <h2>Registration Form</h2>
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="text" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $password; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Contact:</label>
      <input type="text" class="form-control" id="contact" placeholder="Enter contact" name="contact" value="<?php echo $contact; ?>">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
   
    <button type="submit" name="update" class="btn btn-default">Update</button>

  </form>
</div>
</div>



</div>


</body>

<?php
if(isset($_POST["update"]))
{
    mysqli_query($link, "update table1 set username='$_POST[username]', password='$_POST[password]', email='$_POST[email]', contact='$_POST[contact]' where id=$id");


    ?>

    <script type="text/javascript">
        window.location="index.php";
        </script>


    <?php
}
?>



</html>