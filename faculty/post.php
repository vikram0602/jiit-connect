<?php
//session_start();
$updrec="";
include("facultyaccount.php");
?>
<body>
	<script type="text/javascript" src="../admin/editor/ckeditor.js"></script>
	<script src="../admin/editor/_samples/sample.js" type="text/javascript"></script>
	

	<link href="../admin/editor/_samples/sample.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
<!--
.style2 {font-family: Georgia, "Times New Roman", Times, serif;font-size: 24px}
.style3 {font-family:Georgia, "Times New Roman", Times, serif;font-size: 16px}
.style4 {font-size: 18px}
-->
    </style>

        </style>
		<div  align="center">
    	  <form name="form1" method="post" action="../faculty/postSave.php">
    <p class="style2" > AddPost</p>
    <p>:
	<!--<meta http-equiv="refresh" content="15"/>-->

      <textarea class="ckeditor" cols="50" id="editor1" name="editor1" rows="5" placeholder="Whats on Your mind!"  ></textarea>
      <input type="submit" name="Submit" value="POST" onFocus="red" />
    </p>
    <p>&nbsp;</p>
  </form>
</div>



        <?php
  //session_start();
  $username=$_SESSION['CurrentUser'];
  


if(isset($_SESSION['CurrentUser']))
		   {
			
			   
  				// Create connection
				$con=mysqli_connect("127.0.0.1","root","","minor");
				
				
				if (mysqli_connect_errno($con))
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				else
				{
					$result = mysqli_query($con,"SELECT * 
FROM news where username in(select username from login where usertype ='admin')
ORDER BY TIMESTAMP DESC");
					echo '<table width="672" height="103" border="0">';
					$count =0;
					while($row= mysqli_fetch_array($result))
								{
									$result5 = mysqli_query($con,"SELECT * FROM login where username='$row[0]'");
									$row5= mysqli_fetch_array($result5);
									$table=$row5[1]."_details";	
									
									
									$result1 = mysqli_query($con,"SELECT imgurl FROM $table where username='$row[0]';");
								   $row1= mysqli_fetch_array($result1);
								
								$count++;
								//echo '<div>';
								echo '<tr>
    							<td width="31"><img src='.$row1[0].' width="32" height="32" ></td>
    							<td width="507"><p class="style3" width=300 align="left"><font color="99CCFF" align="centre">'.ucfirst($row[3]).'</p></td>
    							<td width="112">'.$row[2].'</td></tr>';
								
								echo '<tr>
										<td>&nbsp;</td>
    									<td colspan="2"><p1 class="style4">'. ucfirst($row[1]).'</p1></td>
  											</tr>';
											echo '<tr>
    												<td colspan="3">&nbsp;</td>
  														</tr>';
								//echo "<p1 class='style4'>".$row[1]."</p1>";
									//echo '</br>';
								//echo '</div>';
								//echo '</br>';
								
								}
								echo "</table>";
					if($count==0)
								{
									echo "<h1>no data found</h1>";
								}
				}
	}
	mysqli_close($con);
    ?>
</body>
</html>