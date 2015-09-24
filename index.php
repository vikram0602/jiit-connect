<!DOCTYPE html>
<html lang="en">
  	

<head>
	<meta charset="utf-8">
	<title>JIIT Connect | College2day</title>
	<meta name="description" content="description">
	<meta name="author" content="Coralix Themes">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="52x52" href="img/apple-touch-icon-57x57.html">
	<link rel="stylesheet" href="css/responsiveslides.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/animate-custom.css"   type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/style.css"            type="text/css" media="screen">

	<link href="css/media-queries.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="js/jquery.min.js"></script> <!-- 1.9.1 -->
    

	<style>
	
	.span6
	{
		font-size:20px;
	}
	</style>
	<script type="text/javascript">
	
		function validate()
		{
			var id=document.forms["curse-form"]["uname"].value;
			var regexp = /[a-z]/gi;
			if(id.match(regexp))
				{
				
				document.getElementById("error").innerHTML="* Enrollment number should contain numbers only";
				document.getElementById('uname').value=null;
				document.getElementById('uname').focus();
				return true;
				}
				else if(isNaN(id)==true)
				{
				document.getElementById("error").innerHTML="* Enrollment number should contain numbers only";
				document.getElementById('uname').value=null;
				document.getElementById('uname').focus();
				return false;
				}
				else if(id.length!=10)
				{
				document.getElementById("error").innerHTML="* Enrollment number should be 10 digit number";
				document.getElementById('uname').focus();
				return false;
				}
				else
				document.getElementById("error").innerHTML=" ";
		}
	
	</script>
</head>

<body style="overflow: hidden">

<?php
  session_start();

				 if(isset($_SESSION['CurrentUserType'])&& isset($_SESSION['CurrentUser']))
				 {
					if($_SESSION['CurrentUserType']=="student")
						header('Location:../minor/stud_accnt/student.php');
					else if($_SESSION['CurrentUserType']=="faculty")
						header('Location:../minor/faculty/facultyaccount.php');
					else if($_SESSION['CurrentUserType']=="admin")
						 header('Location:../minor/admin/adminaccount.php');
				 }
				
?>

<header>


    	<!-- Top Bar -->
    	<div class="top">
        	<div class="container">
            	<a class="logo" href="index.php"><img src="img/logo.png" alt="logo"></a>
            	
            </div>
        </div>
        <!-- End Top Bar -->
        
        <!-- Slider -->
        <div class="form-curse">
        	<div class="bg-map animated fadeIn"></div>
        	<img class="map-point first animated delay1 bounceInDown"   src="img/icon-1.png" alt="map tool tip" width="105" height="139" />
        	<img class="map-point second animated delay2 bounceInDown"  src="img/icon-2.png" alt="map tool tip" width="105" height="139" />
        	<img class="map-point third animated delay3 bounceInDown"   src="img/icon-3.png" alt="map tool tip" width="105" height="139" />
        	<img class="map-point last animated delay4 bounceInDown"    src="img/icon-4.png" alt="map tool tip" width="105" height="139" />
        	
        	<div class="container">
            	<div class="row-fluid">            		
            		<div class="span7 curse-form-box  animated delay5 flipInX">
            			<h3 class="nm text-center">Login to your Profile</strong></h3>
            			<div class="cont">
						<p id="error" style="color:red"></p>
	            			<p class="text-center"></p>
	            			<form id="curse-form" class="nm" action="../minor/login/login.php" method="post">
	            				
	            				<div  id="loading" style="display: none" class='alert'>
					  				<a class='close' data-dismiss='alert'>×</a>
					  				Loading
								</div>
								<div id="response"></div>
								
	            				<div class="row-fluid">
                            		<div class="span6">
                                		User Name:
                                	</div>
                                	
									<div class="span6">
                                	    <input class="input-large" type="text" name="uname" id="uname" maxlength="10" />
                               	    </div>
                                </div>				  
	            				<div class="row-fluid">
								    <div class="span6">
                                		Member Type:
                                	</div>
                            		<div class="span6">
                                		
                                		<select class="input-large" name="utype">
                                			<option value="student" selected>Student</option>
                                			<option value="student">Student</option>
											<option value="faculty">Faculty</option>
                                			<option value="admin">Admin</option>
                                   		</select>
                                		
                                	</div>
                                </div>
								<div class="row-fluid">
                            		<div class="span6">
                                		Password:
                                	</div>
                                	
									<div class="span6">
                                	    <input class="input-large" type="password" name="password" />
                               	    </div>
                                </div>
								<div class="row-fluid">

									<div class="span6">
                            
                                	</div>
                           
                            		<div class="span6">
                                		<a href="forgot.php">Forgot Password</a>
                                	</div>
                                	
						        </div>
								
                                <div class="row-fluid">
                            		<div class="span12 text-center">
										<input class="btn btn-large btn-primary" type="submit" name="some_name" value="Login" id="some_name"/>
                               	    </div>
                                </div>  

							</form>
						</div>
            		</div>
                </div>
            </div>
		</div>
        <!-- End Slider -->	
    <br><br><br><br>
    </header>
    <!-- End Header-->
    
    
  
  </body>

<!-- Mirrored from edutime.coralixthemes.com/blue/index.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 12 Sep 2013 21:23:06 GMT -->
</html>