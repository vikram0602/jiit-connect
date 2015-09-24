<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>College Connect</title>
	<meta name="description" content="description">
	<meta name="author" content="Coralix Themes">

	<link rel="stylesheet" href="/minor/css/style.css" type="text/css" media="screen">
<script src="/minor/js/jquery.min.js">
</script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
$(document).ready(function(){
  $("#flip1").click(function(){
    $("#panel1").slideToggle("slow");
	$('img.expand1').toggleClass('collapse1');
  });
});
$(document).ready(function(){
  $("#flip2").click(function(){
    $("#panel2").slideToggle("slow");
	$('img.expand2').toggleClass('collapse2');
  });
});
$(document).ready(function(){
  $("#flip3").click(function(){
    $("#panel3").slideToggle("slow");
	$('img.expand3').toggleClass('collapse3');
  });
});
$(document).ready(function(){
  $("#flip4").click(function(){
    $("#panel4").slideToggle("slow");
	$('img.expand4').toggleClass('collapse4');
  });
});
$(document).ready(function(){
  $("#flip5").click(function(){
    $("#panel5").slideToggle("slow");
	$('img.expand5').toggleClass('collapse5');
  });
});
$(document).ready(function(){
  $("#flip6").click(function(){
    $("#panel6").slideToggle("slow");
	$('img.expand6').toggleClass('collapse6');
  });
});
</script>
 
<style type="text/css"> 
#panel
{
display:none;
position:absolute;
right:22px;
float:right;
text-align:left;
border:5px ridge #383e44;
box-shadow: 1px 4px 4px #888888;
padding: 10px 10px 10px 10px;
width:170px;
height:200px;
font-size:20px;
color:#000000;
}
#panel1,#flip1,#panel2,#flip2,#panel3,#flip3,#panel4,#flip4,#panel5,#flip5,#panel6,#flip6
{
padding:5px;
cursor:pointer;
}
#panel1,#panel2,#panel3,#panel4,#panel5,#panel6
{
padding:5px;
display:none;
}
.expand1,.expand2,.expand3,.expand4,.expand5,.expand6{
    content:url("/minor/img/add.png");
}
.collapse1,.collapse2,.collapse3,.collapse4,.collapse5,.collapse6{
    content:url("/minor/img/minus.png");
}
#left-column
{
float:left;
border-right:2px ridge #383e44;
min-height:600px;
max-height:100%;
width:180px;
background-color:#383e44;
opacity:0.6;
color:#ffffff;
font-family: 'Open Sans', sans-serif;
font-size:14px;

}
#middle-column
{
	float:left;
}
a 
{
   color:green; 
   font-size:14px;
}
a:hover
{
	color:#FF3300;
	font-size:16px;
}
</style>

</head>

<body>
 <?php include("basic.php"); ?>
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
								echo "<h1>COURSE DETAILS";
								$result = mysqli_query($con,"SELECT * FROM course;");
					
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
</body>
</html>