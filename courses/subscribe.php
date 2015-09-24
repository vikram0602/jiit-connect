<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jiit Connect</title>
</head>

<body>
<?php
session_start();
$id=$_GET['col1'];
include("../Connections/con1.php");
$con=mysqli_connect($hostname_con1,$username_con1,$password_con1,$database_con1);
		if (mysqli_connect_errno($con))
		{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else
		{
			$result = mysqli_query($con,"insert into course_student values('$id','".$_SESSION['CurrentUser']."')");
			header("Location:courses.php?col=$id");
		}

?>
</body>
</html>