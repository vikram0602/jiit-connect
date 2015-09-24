<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title>College2day</title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
 </head>

 <body>
  <?php
  session_start();
  $username=$_POST["uname"];
  $usertype=$_POST["utype"];
  $password=$_POST["password"];
  $tablename=$usertype."_details";
  
  echo $username;
  echo $usertype;
  echo $password;
  echo $tablename;
	


  // Create connection
$con=mysqli_connect("127.0.0.1","root","","minor");
if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

else
	{
		
		$result0 = mysqli_query($con,"SELECT username FROM login WHERE username='".$username."' and usertype='".$usertype."' and password='".$password."'" );
		if($row0= mysqli_fetch_array($result0))
		{
			
			$result1 = mysqli_query($con,"SELECT Firstname, Lastname FROM ".$tablename." WHERE Username='".$username."'");
			if($row1=mysqli_fetch_array($result1));
			{
				$_SESSION['CurrentUser']=$username;
				$_SESSION['CurrentUserName']=$row1[0]." ".$row1[1];
				$_SESSION['CurrentUserType']=$usertype;
				echo $_SESSION['CurrentUser'];
				$_SESSION['CurrentUserType'];
				if($_SESSION['CurrentUserType']=="student")
				{
					header('Location:../stud_accnt/student.php');
					exit;
				}
				else if($_SESSION['CurrentUserType']=="faculty")
				{
					header('Location:../faculty/facultyaccount.php');
					exit;
				}
				else if($_SESSION['CurrentUserType']=="admin")
				{
					header('Location:../admin/adminaccount.php');
					exit;
				}
			}
			
			
			
		}
		else
		{
			//header('Location:login-unsuccessfull.php');
			//exit;
		}
		
		
	}
	mysqli_close($con);
  ?>
 </body>
</html>
