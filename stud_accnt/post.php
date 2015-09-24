<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style type="text/css">
<!--
.style2 {font-family: Georgia, "Times New Roman", Times, serif;font-size: 24px}
.style3 {font-family:Georgia, "Times New Roman", Times, serif;font-size: 20px;
text-align:left;}
.style4 {font-size: 16px;
float:left;
font-family:Georgia, "Times New Roman", Times, serif;
text-align:left;
color:#000000;
width:500px;}
-->
    </style>
<body>
<div  align="center">
    	
  <br><br>
    <p class="style2" >NEWS FEEDS </p>
</div>
<?php

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
FROM news
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