<?php
 include_once("/config.php");
  session_start();
if(!isset($_SESSION['CurrentUser']) || $_SESSION['CurrentUserType']!="student")
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
					 if($_SESSION['CurrentUserType']=="student")
					 {
							echo "<ul class='btns-top'><li  class='btn btn-large btn-inverse' id='flip'>My Acount</li></ul>";
							echo "</div></div></header><div id='panel' >";
							echo $_SESSION['CurrentUserName']."<br><br>";
							echo "<a href='edit-profile.php'>Edit Profile</a><br><br>";
							echo '<a href="/minor/login/change-password.php">Change Password</a><br>';
							echo "<a href='/minor/login/logout.php'>Logout</a><br><br>";
						
					 }
					 else
						 header("location:/minor/login/logout.php");
				 }
				 $pic="";
				  if($_SESSION['CurrentUserType']=="student")
					{
							$con=mysqli_connect($host,$username,$password,$database);
							if (mysqli_connect_errno($con))
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							else
							{
							$result = mysqli_query($con,"SELECT gender, imgurl FROM student_details WHERE username='".$_SESSION['CurrentUser']."'");
							if($row= mysqli_fetch_array($result))
							{
								if($row[0]=="female" and $row[1]==NULL)
								  $pic="/minor/img/female.png";
								else if ($row[0]=="male" and $row[1]==NULL)
                                  $pic="/minor/img/male.png";
								else if($row[0]=="female" and $row[1]!=NULL)
								  $pic=$row[1];

								else if ($row[0]=="male" and $row[1]!=NULL)
                                 	$pic=$row[1];

							}
							}
					mysqli_close($con);
					}
					
					 
				 ?>
			</div>		
		<div id="left-column" style="padding:20px 0px 0px 20px">
		<a href="upload-pic.php"><img src="<?php echo $pic; ?>" width="150" height="150"></a>
		<div id="flip1"></div>
        
		<a href="changepic.php">Change Picture</a><br>
        <a href="fms.php" target="_blank">F.M.S</a><br>
         <a href="main_forum.php">Discussion Forum</a><br>
         <a href="webkiosk.php">Webkiosk</a><br>
        
        
        <div id="flip2"><img width="16" height="16" class="expand2" border="0" alt="">Faculty</div>
<div id="panel2"><a href="search-fac.php?type=faculty">Search Faculty</a><br><a href="add-new-faculty.php">Add New Faculty</a><br><a href="delete-fac.php">Delete Faculty</a><br> <a href="#"></a><br>
</div>

<div id="flip4"><img width="16" height="16" class="expand4" border="0" alt="">Courses</div>
<div id="panel4"><a href="courses.php">Search Course</a><br><a href="courses.php">Subscribe New Course</a><br><a href="courses.php">Unsubscribe Course</a><br>
<a href="#"></a><br>
</div>
<!--
<div id="flip5"><img width="16" height="16" class="expand5" border="0" alt="">Notices</div>
<div id="panel5"><a href="search.php?type=notice">Search Notice</a><br>
-->
<br>
</div>
</div>
		