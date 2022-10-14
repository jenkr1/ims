<!DOCTYPE html>
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<?php 

include "connection.php";

?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">

  

  <link rel="stylesheet" href="styleforindex.css"/>

</head>
<body>


<form class="form" action="" method="post">
      <h1 class="login-title">Hey, <?php echo $_SESSION['username']; ?>!</h1>
        <h1 class="login-title">Add User Here:</h1>
        <input type="text" class="login-input" name="username" placeholder="Username"  />
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="text" class="login-input" name="email" placeholder="Email"  />
        <input type="text" class="login-input" name="contact" placeholder="Contact" />
 
  
    <button type="submit" name="insert">Insert</button>

    <button type="submit" name="view">View</button>
    <button type="submit" name="search">Search</button>
     <a href="logout.php" button class="btn draw-border" button type="submit" name="logout">Logout</button></a>
</form>
   
   

</div>
</div>



<?php
    if(isset($_POST["insert"]))
    {
       mysqli_query($link, "insert into table1 values(NULL,'$_POST[username]',' $_POST[password]',' $_POST[email]',' $_POST[contact]')");

        ?>
        <script type="text/javascript">
            window.location.href=window.location.href;
            </script>

        <?php


    }
    if(isset($_POST["delete"]))
    {
        mysqli_query($link, "delete from table1 where username='$_POST[username]'") or die(mysqli_error($link));

        ?>
        <script type="text/javascript">
            window.location.href=window.location.href;
            </script>

        <?php
    }
    if(isset($_POST["update"]))
    {
        mysqli_query($link, "update from table1 set username='$_POST[password]' where username='$_POST[password]'") or die(mysqli_error($link));


        ?>
        <script type="text/javascript">
            window.location.href=window.location.href;
            </script>

        <?php
    }
    if(isset($_POST["view"])){
        mysqli_query($link, "select * from table1");

        ?>
        <script type="text/javascript">
             window.location="view.php";
            </script>

        <?php
    }

    if(isset($_POST["search"])){
      mysqli_query($link, "select * from table1");

      ?>
      <script type="text/javascript">
           window.location="search.php";
          </script>

      <?php
  }
?>

    

  
  

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>