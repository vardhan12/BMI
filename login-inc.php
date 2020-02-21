<?php
session_start();
include 'dbh-inc.php';
$user_id=$_POST['uid'];
$pwd=$_POST['pwd'];
$sql="select * from users where uid='$user_id' and pwd='$pwd';";
$result=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($result);
if($resultcheck>0){
	while($row=mysqli_fetch_array($result)){
		if($row['uid']==$user_id and $row['pwd']==$pwd){
			echo "hello"." ".$row['fname'];
			$_SESSION['logid']=$row['loginid'];
			$_SESSION['f_name']=$row['fname'];
		}


	}
}
else{
	echo "login unsuccessfull";
}
?>


<html>
<head>
	<title>BMI Calculator</title>
</head>
<body>
	<h3>Welcome to BMI Calculator</h3>
	<form action="bmi-inc.php" method="POST">
		<label>height(in m)</label>
		<input type="text" name="height"><br>
		<label>Weight(in kg)</label>
		<input type="text" name="weight"><br>
		<button type="submit" name="submit">BMI</button>
	</form>
	



</body>
</html>

