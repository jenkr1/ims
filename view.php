<?php
include "connection.php";
?>
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">

  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="tabledesign.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>

<a href="index.php"><i class="fa fa-arrow-circle-left" style="font-size:36px"></i></a>

<center>
<table class="content-table">
    <thead>
      <tr>
        <th>#</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
</center>
    <?php 
    $res=mysqli_query($link, "select * from table1");
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>"; echo $row["id"]; echo "</td>";
        echo "<td>"; echo $row["username"]; echo "</td>";
        echo "<td>"; echo $row["password"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td>"; echo $row["contact"]; echo "</td>";
        echo "<td>"; ?> <a href="edit.php?id= <?php echo $row["id"]; ?>"><button type="button" class="btn btn-success"> Edit </button></a> <?php  echo "</td>";
        echo "<td>"; ?> <a href="delete.php?id= <?php echo $row["id"]; ?>"><button type="button" class="btn btn-danger"> Delete </button></a> <?php  echo "</td>";

        echo "</tr>";
    }

    ?>

    
    
    </tbody>
  </table>

</div>
<?php
mysqli_close($link);

?>

</html>