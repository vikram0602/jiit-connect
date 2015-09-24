<!-- Header-->
    <header>
    	<!-- Top Bar -->
    	<div class="top">
 
		
		<div id="middle-column">
	</div>
		
  <?php
  session_start();
  $username=$_SESSION['CurrentUser'];
  $subject=$_POST["sub"];
  $year=$_POST["year"];
  $batch=$_POST["batch"];
  $message=$_POST["editor1"];
	$date=date("Y-m-d");

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

				else
				{
					//echo $username."<br>";
					//echo $message. "<br>";
					//echo $date. "<br>";
					$result0 = mysqli_query($con,"INSERT into notice VALUES(".$username.",'".$date."','".$subject."',".$year.",'".$batch."','".$message."')");
					$result1 = mysqli_query($con,"SELECT emailid FROM student_details WHERE batch='".$batch."'");
					$result3 = mysqli_query($con,"SELECT email_id FROM faculty_details WHERE username=". $username);
					$row1= mysqli_fetch_array($result3);
					$fmail = "vikram0602@gmail.com";
					//$row1['email_id'];
					$headers = "From:" . $fmail;
					while($row = mysqli_fetch_array($result1))
  					{
						$to=$row['emailid'];
						
						mail($to,$subject,$message,$headers);
					}
					header('Location:facultyaccount.php');
					exit;
				}
			}
			   else
				   echo "not authorised user"; 
		
		
	}
	mysqli_close($con);
  ?>
 </body>

</html>