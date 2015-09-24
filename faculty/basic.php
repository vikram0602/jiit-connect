<?php
 include_once("/config.php");
  session_start();
if(!isset($_SESSION['CurrentUser']) || $_SESSION['CurrentUserType']!="faculty")
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
					 if($_SESSION['CurrentUserType']=="faculty")
					 {
							echo "<ul class='btns-top'><li  class='btn btn-large btn-inverse' id='flip'>My Acount</li></ul>";
							echo "</div></div></header><div id='panel' >";
							echo $_SESSION['CurrentUserName']."<br><br>";
							echo "<a href='edit-profile.php'>Edit Profile</a><br><br>";
							echo "<a href='edit-profile.php'>Account Settings</a><br><br>";
						
							echo '<a href="/minor/login/change-password.php">Change Password</a><br>';
								echo "<a href='/minor/login/logout.php'>Logout</a><br><br>";
					 }
					 else
						 header("location:/minor/login/logout.php");
				 }
				 $u=$_SESSION['CurrentUser'];
				  if($_SESSION['CurrentUserType']=="faculty")
					{
							$con=mysqli_connect($host,$username,$password,$database);
							if (mysqli_connect_errno($con))
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							else
							{
							$result = mysqli_query($con,"SELECT gender,imgurl FROM faculty_details WHERE username='$u'");
							
							
							if($row = mysqli_fetch_array($result))
							{
						
								if($row[0]=="female" and $row[1]==NULL)
								  $pic="../img/female.png";
								else if ($row[0]=="male" and $row[1]==NULL)
                                  $pic="../img/male.png";
								else if($row[0]=="female" and $row[1]!=NULL)
								  $pic="../faculty/userimg/sachin.jpg";

								else if ($row[0]=="male" and $row[1]!=NULL)
                                 	$pic="../faculty/usersimg/sachin.jpg";

							}
							}
					mysqli_close($con);
					}
					
					 
				 ?>
			</div>		
		<div id="left-column" style="padding:20px 0px 0px 20px">
		<a href="upload-pic.php"><img src="<?php echo $pic ?>" width="150" height="150"></a>
		<div id="flip1"></div>
        
		<a href="changepic.php">	Change Picture</a>
		<div id="flip6"></div>
        
		<a href="post.php">	News Feeds</a><br />
        <a href="main_forum.php">	Discussion Forum</a><br />
		<a href="fms.php">	F.M.S</a>
		


<div id="flip4"><img width="16" height="16" class="expand4" border="0" alt="">Courses</div>
<div id="panel4"><a href="stud_courses.php">Search Course</a><br><a href="add-new.php?type=course">Add New Course</a><br><a href="delete-course.php">Delete Course</a><br>
<a href="#"></a><br>
</div>
<div id="flip5"><img width="16" height="16" class="expand5" border="0" alt="">Notices</div>
<div id="panel5"><a href="notice.php">Add Notice</a><br>

        
	


<br>
</div>
</div>
		