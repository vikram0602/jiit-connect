<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
 include_once("/config.php");
  session_start();
if(!isset($_SESSION['CurrentUser']) || $_SESSION['CurrentUserType']!="admin")
	 header("location:/minor/login/logout.php");
 ?>
<!-- Header-->
    <header>
    	<!-- Top Bar -->
    	<div class="top">
        	<div class="container">
            	<a class="logo" href="/minor/index.php"><img src="/minor/img/logo.png" alt="logo"></a>
            	
				<?php
				 if(isset($_SESSION['CurrentUser']))
				 {
					 if($_SESSION['CurrentUserType']=="admin")
					 {
							echo "<ul class='btns-top'><li  class='btn btn-large btn-inverse' id='flip'>My Acount</li></ul>";
							echo "</div></div></header><div id='panel' >";
							echo $_SESSION['CurrentUserName']."<br><br>";
							echo "<a href='update-admin.php'>Edit Profile</a><br><br>";
							echo "<a href='edit-profile.php'>Account Settings</a><br><br>";
							echo "<a href='/minor/login/logout.php'>Logout</a><br><br>";
							echo '<a href="/minor/login/change-password.php">Change Password</a>';
					 }
					 else
						 header("location:/minor/login/logout.php");
				 }
				  if($_SESSION['CurrentUserType']=="admin")
					{
							$con=mysqli_connect($host,$username,$password,$database);
							if (mysqli_connect_errno($con))
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							else
							{
							$result = mysqli_query($con,"SELECT Gender, imgurl FROM admin_details WHERE username='".$_SESSION['CurrentUser']."'");
							if($row= mysqli_fetch_array($result))
							{
								if($row[0]=="Female" and $row[1]==NULL)
								  $pic="/minor/img/female.png";
								else if ($row[0]=="Male" and $row[1]==NULL)
                                  $pic="/minor/img/male.png";
								else if($row[0]=="Female" and $row[1]!=NULL)
								  $pic=$row[1];
								else if ($row[0]=="Male" and $row[1]!=NULL)
                                  $pic=$row[1];
							}
							else
							{
								header('Location:/minor/login/logout.php');
							}}
					mysqli_close($con);
					}
					
					 
				 ?>
			</div>		
		<div id="left-column" style="padding:20px 0px 0px 20px">
		<a href="upload-pic.php"><img src="<?php echo $pic ?>" width="150" height="150"></a>
		<div id="flip1"><img width="16" height="16" class="expand1" border="0" alt="">Student</div>
<div id="panel1"><a href="search.php?type=student">Search Student</a><br><a href="add-student.php">Add New Student</a><br></div>

<div id="flip2"><img width="16" height="16" class="expand2" border="0" alt="">Faculty</div>
<div id="panel2"><a href="search.php?type=faculty">Search Faculty</a><br><a href="add-faculty.php">Add New Faculty</a><br></div>
<div id="flip3"><img width="16" height="16" class="expand3" border="0" alt="">Admin</div>
<div id="panel3"><a href="search.php?type=admin">Search Admin</a><br><a href="add-admin.php">Add New Admin</a><br></div>
<div id="flip4"><img width="16" height="16" class="expand4" border="0" alt="">Courses</div>
<div id="panel4"><a href="search.php?type=course">Search Course</a><br><a href="add-new.php?type=course">Add New Course</a><br><a href="delete-course.php">Delete Course</a><br><a href="#"> Edit Course Details</a><br></div>
<div id="flip5"><img width="16" height="16" class="expand5" border="0" alt="">Notices</div>
<div id="panel5"><a href="search.php?type=notice">Search Notice</a><br><a href="add-new.php?type=notice">Add New Notice</a><br><a href="delete-notice.php">Delete Notice</a><br><a href="#"> Edit Notice Details</a><br></div><div id="fms"><a href="fms.php">FMS</a></div><div id="fms"><a href="post.php">News Feed</a></div>

</div>
		