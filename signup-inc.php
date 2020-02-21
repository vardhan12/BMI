<?php
include 'dbh-inc.php';
$first=$_POST['first'];
$last=$_POST['last'];
$email=$_POST['email'];
$uid=$_POST['uid'];
$pwd=$_POST['pwd'];
$sql="INSERT INTO users(fname,lname,email,uid,pwd) values('$first','$last','$email','$uid','$pwd'); ";
mysqli_query($conn,$sql);
header("Location: ../registration.php?signup=success");
?>


