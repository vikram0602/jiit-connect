 <?php
 
  session_start();

 ?>
<!-- Header-->
    <header>
    	<!-- Top Bar -->
    	<div class="top">
 
		
		<div id="middle-column">
	</div>
		
		<?php	
		$a=1;
		   $user=$_GET['username'];
		   if(isset($_SESSION['CurrentUser']))
		   {
				if($_SESSION['CurrentUserType']=="student")
			   {
						$con=mysqli_connect("127.0.0.1","root","","project");
							if (mysqli_connect_errno($con))
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							else
							{
								 mysqli_query($con,"insert into student_details where username =".$user.";");
								echo "<h1>Record updated successfully</h1>";
							}
				mysqli_close($con);
			   
			   }
			   else
				   echo "not authorised user"; 
		   
		   }
		   else
			header('Location:logout.php');
		?>
		<?php include("studentaccount.php"); ?>
</body>

</html>