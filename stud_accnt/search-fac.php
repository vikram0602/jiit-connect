          	
		
   <?php include("studentaccount.php"); ?>
  <div id="middle-column">
   <?php	

						$con=mysqli_connect($host,$username,$password,$database);
				echo '<table border=2 ><tr id="heading"><td>Sno.</td><td>Enrollment No:</td><td>Name</td><td>Branch</td><td>Year</td><td>Batch</td><td>Contact No.</td><td>Email_ID</td><td>EDIT</td><td>Delete</td></tr>';
							if (mysqli_connect_errno($con))
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							else
							{
								echo "<h1>Faculty Details";
								$result = mysqli_query($con,"SELECT * FROM faculty_details;");
					
							$count =0;
								
								while($row= mysqli_fetch_array($result))
								{
									//echo "<tr id='content'><td><b>".$a.".</b></td>";
									
									echo "<td>".$row[0]."</td>";
									echo "<td>".$row[0]."</td>";
									echo "<td>".$row[1]."</td>";
									echo "<td>".$row[7]."</td>";
									//echo "<td>".$row[9]."</td>";
									echo "<td>".$row[8]."</td>";
									echo "<td>".$row[8]."</td>";
									echo "<td>+91-".$row[4]."</td>";
									echo "<td>".$row[3]."</td>";
									echo "<td><a href='add-new-faculty.php?user=".$row[0]."'>ADD</td>";
									echo "<td><a href='delete-faculty.php?user=".$row[0]."'>DELETE</td></tr>";
								
									$count++;
								}
								echo "</table>";
								if($count==0)
								{
									echo "<h1>no data found</h1>";
								}

							
				mysqli_close($con);
	}
		?>
  
	
</div>

</body>
</html>