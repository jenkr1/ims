<!DOCTYPE html>
<?php 

include "connection.php";

?>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>

    
	<link rel="stylesheet" type="text/css" href="style4.css">
</head>
<body>
    
<?php
    require('connection.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($link, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($link, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `table1` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($link, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
 
  <form class="form" method="post" name="login">

        <h1 class="login-title">Login</h1>
     
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
     

        <input type="password" class="login-input" name="password" placeholder="Password"/>
        
        <center>
        <button type="submit" value="Login" name="submit"> Login
    </button>
    </center>
        <p class="link"><a href="registration.php">New Registration</a></p>
 
  </form>
    
<?php
    }
?>
</body>
</html>