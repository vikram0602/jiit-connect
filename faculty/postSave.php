<!-- Header-->
    <header>
    	<!-- Top Bar -->
    	<div class="top">
 
		
		<div id="middle-column">
	</div>
		<?php
  session_start();
  $username=$_SESSION['CurrentUser'];
  $message=$_POST["editor1"];
  $date=date("Y-m-d");
	$name=$_SESSION['CurrentUserName'];
  
  if(isset($_SESSION['CurrentUser']))
		   {
				if($_SESSION['CurrentUserType']=="faculty")
			   {
  				// Create connection
				$con=mysqli_connect("127.0.0.1","root","","minor");
				if (mysqli_connect_errno($con))
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				else if (empty($message))
				header('Location:post.php'); 
				else
				{
				$result0 = mysqli_query($con,"INSERT into news (username,post,date,name)VALUES(".$username.",'".$message."','".$date."','".$name."')");
				}
			}
			   else
				   echo "not authorised user"; 
				   header('Location:post.php');
					exit;
		
		
	}
	mysqli_close($con);
  ?>
 </body>

</html>