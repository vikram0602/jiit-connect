<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
<title>College Connect</title>
	<meta name="description" content="description">
	<meta name="author" content="Coralix Themes">

	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<script src="js/jquery.min.js">
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
    content:url("img/add.png");
}
.collapse1,.collapse2,.collapse3,.collapse4,.collapse5,.collapse6{
    content:url("img/minus.png");
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
	color:#000000;
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
#register-student
{
  font-size:16px;
  border:2px dashed #383e44;
  padding: 40px;

}
#heading
{
	font-size:35px;
	text-align:center;
	padding:20px;
}
</style>
<script src="js/jquery.min.js">
</script>

</head>

<body>
 <?php
 
  //session_start();

 ?>

    	
            	
		
   <?php include("studentaccount.php"); ?>
</body>
</html>
