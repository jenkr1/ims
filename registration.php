<!DOCTYPE html>


<?php 

include "connection.php";

?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>

    <link rel="stylesheet" href="style4.css"/>
</head>
<body>
<?php
    require('connection.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($link, $username);
        $password = stripslashes($_REQUEST['password']);
        
        $password = mysqli_real_escape_string($link, $password);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($link, $email);
        $contact = stripslashes($_REQUEST['contact']);
        $contact = mysqli_real_escape_string($link, $contact);
        $query    = "INSERT into `table1` (username, password, email, contact)
                     VALUES ('$username', '" . md5($password) . "','$email','$contact')";
        $result  = mysqli_query($link, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
  <body>

<form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="text" class="login-input" name="email" placeholder="Email" required />
        <input type="text" class="login-input" name="contact" placeholder="Contact" required />

        <center>
        <button type="submit" name="submit" value="Register" > Register
    </button>
    </center>
        <p class="link"><a href="login.php">Click to Login</a></p>
        
    </form>

<?php
    }
?>
</body>
</html>