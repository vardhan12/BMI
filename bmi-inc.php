<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>database</title>
</head>
<body>
	<?php
include 'dbh-inc.php';
$lid=$_SESSION['logid'];
$name=$_SESSION['f_name'];
$f=0;
$height=$_POST['height'];
$weight=$_POST['weight'];
$bmi=$weight/($height*$height);
$sql2="SELECT loginid from bmi;";
$result1=mysqli_query($conn,$sql2);
$resultcheck=mysqli_num_rows($result1);
if($resultcheck>0){
	
	while($row1=mysqli_fetch_array($result1)){
		if($row1['loginid']==$lid){
			$f=1;
		}
	}
}

if($f==0){
	$sql="INSERT INTO bmi(loginid,height,weight,bmi)values('$lid','$height','$weight','$bmi');";
	mysqli_query($conn,$sql);
}
else{
	$sql3="UPDATE bmi set bmi='$bmi',height='$height',weight='$weight' where loginid='$lid';";
	mysqli_query($conn,$sql3);
}



$sql1="select users.fname,bmi.bmi from users JOIN bmi ON users.loginid=bmi.loginid where users.fname='$name';";

$result=mysqli_query($conn,$sql1);

$row=mysqli_fetch_array($result);
?>
	<table border="1px">
		<tr>
			<td>name</td>
			<td>bmi</td>
		</tr>
	


<tr>
	<td><?php echo $row['fname']; ?></td>
	<td><?php echo $row['bmi']; ?></td>
	<br>
</tr>
</table>
<?php
if ($bmi>18 && $bmi <23) {
echo "<b> You are in a great shape</b> <br>";
}
elseif ($bmi<=18) {
	echo "<b> Time to eat</b> <br>";
}
else{
	echo "<b> time for workouts <br>";
}
?>
</body>
</html>