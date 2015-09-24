<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIIT || JIIT CONNECT</title>
</head>

<script src="/minor/js/jquery.min.js">
</script>
<script src="/minor/admin/script/main.js">
</script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link rel="stylesheet" href="/minor/css/style.css" type="text/css" media="screen">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?php
include_once("template.php");?>

<?php require_once('../Connections/con1.php'); ?>
<style>
#heading
{
	font-size:16px;
	text-align:center;
	padding:20px;
	background-color:#cc8855;
}
#content
{
	font-size:14px;
	text-align:center;
	padding:16px;
}
td
{
padding:6px;
}
</style>
<?php
$a=1;
		   
		   if(isset($_GET['type']))
		   {
			   $type=$_GET['type'];
		   $action=$_SERVER["PHP_SELF"].'?type='.$type;
			if($type=='student')
			{
				echo '
				<form method="post" action="'.$action.'">
					<table><tr><td id="content">Enter Detail:</td><td><input type="text" name="search"></td>
					<td><select name="column">
						<option value="Username" selected>Enrollment No
						<option value="Firstname">First Name
						<option value="Lastname">Last Name
						<option value="Contact">Contact No
						<option value="emailid">Email_Id
					</select></td><td>
					<input type="submit" value="Search"></td></tr></table>
				</form>
				
				';
				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$search=$_POST["search"];
					$column=$_POST["column"];
				
     				$con=mysqli_connect($hostname_con1,$username_con1,$password_con1,$database_con1);
							if (mysqli_connect_errno($con))
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							else
							{
								
								$result = mysqli_query($con,"SELECT * FROM student_details where $column ='$search';");
								$count =0;
								echo '<table border=2 ><tr id="heading"><td>Sno.</td><td>Enrollment No:</td><td>Name</td><td>Branch</td><td>Year</td><td>Batch</td><td>Contact No.</td><td>Email_ID</td><td>Profile</td><td>Edit</td><td>Delete</td></tr>';
								while($row= mysqli_fetch_array($result))
								{
									echo "<tr id='content'><td><b>".$a.".</b></td>";
									echo "<td>".$row[0]."</td>";
									echo "<td>".$row[1]." ".$row[2]." ".$row[3]."</td>";
									echo "<td>".$row[6]."</td>";
									echo "<td>".$row[7]."</td>";
									echo "<td>".$row[8]."</td>";
									echo "<td>+91-".$row[5]."</td>";
									echo "<td>".$row[4]."</td>";
									echo '<td><a href="view-student.php?col='.$row[0].'">View</td>';
									echo '<td><a href="edit-student.php?col='.$row[0].'">Edit</td>';
									echo '<td><a href="delete-student.php?con='.$row[0].'">Delete</td>';
									$a++;
									$count++;
								}
								echo "</table>";
								if($count==0)
								{
									echo "<h1>no data found</h1>";
								}

							}
				mysqli_close($con);
				}
			}
			else if($type=='faculty')
			{
				echo '
				<form method="post" action="'.$action.'">
					<table><tr><td id="content">Enter Detail:</td><td><input type="text" name="search"></td>
					<td><select name="column">
						<option value="username" selected>Faculty Id
						<option value="Firstname">First Name
						<option value="middle_name">Middle Name
						<option value="Lastname">Last Name
						<option value="contact_no">Contact No
						<option value="email_id">Email_Id
						<option value="department">Department
					</select></td><td>
					<input type="submit" value="Search"></td></tr></table>
				</form>
				
				';
				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$search=$_POST["search"];
					$column=$_POST["column"];
				
     				$con=mysqli_connect($hostname_con1,$username_con1,$password_con1,$database_con1);
							if (mysqli_connect_errno($con))
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							else
							{
								
								$result = mysqli_query($con,"SELECT * FROM faculty_details where $column ='$search';");
								$count =0;
								echo '<table border=2 ><tr id="heading"><td>Sno.</td><td>Faculty Id:</td><td>Name</td><td>Department</td><td>Designation</td><td>Contact No.</td><td>Email_ID</td><td>Profile</td><td>Edit</td><td>Delete</td></tr>';
								while($row= mysqli_fetch_array($result))
								{
									echo "<tr id='content'><td><b>".$a.".</b></td>";
									echo "<td>".$row[0]."</td>";
									echo "<td>".$row[1]." ".$row[2]." ".$row[3]."</td>";
									echo "<td>".$row[4]."</td>";
									echo "<td>".$row[10]."</td>";
									echo "<td>+91-".$row[6]."</td>";
									echo "<td>".$row[5]."</td>";
									echo '<td><a href="view-faculty.php?col='.$row[0].'">View</td>';
									echo '<td><a href="edit-faculty.php?col='.$row[0].'">Edit</td>';
									echo '<td><a href="delete-faculty.php?col='.$row[0].'">Delete</td>';
									$a++;
									$count++;
								}
								echo "</table>";
								if($count==0)
								{
									echo "<h1>no data found</h1>";
								}

							}
				mysqli_close($con);
			}
		}
			else if($type=='admin')
			{
					echo "<br><br>";
					echo '<h1>Admin Details</h1>';
     				$con=mysqli_connect($hostname_con1,$username_con1,$password_con1,$database_con1);
							if (mysqli_connect_errno($con))
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							else
							{
								
								$result = mysqli_query($con,"SELECT * FROM admin_details");
								$count =0;
								echo '<table border=2 ><tr id="heading"><td>Sno.</td><td>Admin Id:</td><td>Name</td><td>Contact No.</td><td>Email_ID</td><td>Profile</td><td>Edit</td><td>Delete</td></tr>';
								while($row= mysqli_fetch_array($result))
								{
									echo "<tr id='content'><td><b>".$a.".</b></td>";
									echo "<td>".$row[0]."</td>";
									echo "<td>".$row[1]." ".$row[2]." ".$row[3]."</td>";
									echo "<td>+91-".$row[5]."</td>";
									echo "<td>".$row[4]."</td>";	
									echo '<td><a href="view_adminprofile.php?col='.$row[0].'">View</td>';
									echo '<td><a href="edit-admin.php?col='.$row[0].'">Edit</td>';
									echo '<td><a href="delete-admin.php?col='.$row[0].'">Delete</td>';
									$a++;
									$count++;
								}
								echo "</table>";
								

							}
				mysqli_close($con);
			}
			
		   }
			else
			{
				echo "<h1>Page Not Found</h1>";
			}
?>		


</body>
</html>