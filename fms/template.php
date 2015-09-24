<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
 include_once("/config.php");
  session_start();
if(!isset($_SESSION['CurrentUser']))
	header("location:/minor/login/logout.php");
 ?>
<!-- Header-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/minor/css/style.css" type="text/css" media="screen">
<script src="/minor/js/jquery.min.js">
</script>
<script src="/minor/js/left.js">
</script>
    <header>
    	<!-- Top Bar -->
    	<div class="top">
        	<div class="container">
            	<a class="logo" href="/minor/index.php"><img src="/minor/img/logo.png" alt="logo"></a>
            	
				<?php
				 if(isset($_SESSION['CurrentUser']))
				 {
							echo "<ul class='btns-top'><li  class='btn btn-large btn-inverse' id='flip'>My Acount</li></ul>";
							echo "</div></div></header><div id='panel' >";
							echo $_SESSION['CurrentUserName']."<br><br>";
							echo "<a href='update-admin.php'>Edit Profile</a><br><br>";
							echo "<a href='edit-profile.php'>Account Settings</a><br><br>";
							echo "<a href='/minor/login/logout.php'>Logout</a><br><br>";
				 }
				 
					
					   if($_SESSION['CurrentUserType']=="admin")
					   {
						    if(isset($_SESSION['CurrentUserType']))
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
				echo '
			</div>		
		<div id="left-column" style="padding:20px 0px 0px 20px">
		<a href="upload-pic.php"><img src="'.$pic.'" width="150" height="150"></a>
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

</div>';
						}
						
						else if($_SESSION['CurrentUserType']=="student")
						{
							 if(isset($_SESSION['CurrentUserType']))
					{
							$con=mysqli_connect($host,$username,$password,$database);
							if (mysqli_connect_errno($con))
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							else
							{
							$result = mysqli_query($con,"SELECT Gender, imgurl FROM student_details WHERE username='".$_SESSION['CurrentUser']."'");
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
							echo '	</div>		
		<div id="left-column" style="padding:20px 0px 0px 20px">
		<a href="upload-pic.php"><img src="'.$pic.'" width="150" height="150"></a>
		<div id="flip1"></div>
        
		<a href="../stud_accnt/changepic.php">Change Picture</a><br>
        <a href="../fms/fms_test.php" target="_blank">F.M.S</a>
        
        
        <div id="flip2"><img width="16" height="16" class="expand2" border="0" alt="">Faculty</div>
<div id="panel2"><a href="../stud_accnt/search-fac.php?type=faculty">Search Faculty</a><br><a href="../stud_accnt/add-new-faculty.php">Add New Faculty</a><br><a href="../stud_accnt/delete-fac.php">Delete Faculty</a><br> <a href="#"></a><br>
</div>

<div id="flip4"><img width="16" height="16" class="expand4" border="0" alt="">Courses</div>
<div id="panel4"><a href="../stud_accnt/stud_courses.php">Search Course</a><br><a href="../stud_accnt/add-new.php?type=course">Add New Course</a><br><a href="../stud_accnt/delete-course.php">Delete Course</a><br>
<a href="#"></a><br>
</div>
<div id="flip5"><img width="16" height="16" class="expand5" border="0" alt="">Notices</div>
<div id="panel5"><a href="../stud_accnt/search.php?type=notice">Search Notice</a><br>
<br>
</div>
</div>';
						
						}
						else if($_SESSION['CurrentUserType']=="faculty")
						{
							 if(isset($_SESSION['CurrentUserType']))
					{
							$con=mysqli_connect($host,$username,$password,$database);
							if (mysqli_connect_errno($con))
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							else
							{
							$result = mysqli_query($con,"SELECT Gender, imgurl FROM faculty_details WHERE username='".$_SESSION['CurrentUser']."'");
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
							echo '</div>		
		<div id="left-column" style="padding:20px 0px 0px 20px">
		<a href="upload-pic.php"><img src="'.$pic.'" width="150" height="150"></a>
		<div id="flip1"></div>
        
		<a href="changepic.php">	Change Picture</a>
		<div id="flip6"></div>
        
		<a href="post.php">	News Feeds</a>
		
<div id="flip2"><img width="16" height="16" class="expand2" border="0" alt="">Update</div>
<div id="panel2"><a href="studymaterial.php">Study Material</a><br><a href="add-assignment.php">Assignment</a><br><a href="add-quiz.php">Quiz</a><br> <a href="#"></a><br>
</div>

<div id="flip4"><img width="16" height="16" class="expand4" border="0" alt="">Courses</div>
<div id="panel4"><a href="stud_courses.php">Search Course</a><br><a href="add-new.php?type=course">Add New Course</a><br><a href="delete-course.php">Delete Course</a><br>
<a href="#"></a><br>
</div>
<div id="flip5"><img width="16" height="16" class="expand5" border="0" alt="">Notices</div>
<div id="panel5"><a href="notice.php">Add Notice</a><br>

        
	


<br>
</div>
</div>
		';
						}