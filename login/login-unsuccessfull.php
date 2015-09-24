<!doctype html>
<html>
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>College2day | JIIT Connect |lms jiit</title>
    <link rel="stylesheet" href="../css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
    <script src="../js/login.js"></script>
	<style>
#loginForm
{
position:absolute;
left:40%;
top:30%;

}
p
{
color:red;
position:absolute;
top:23%;
left:39.5%;
}
</style>	                
            
</head>
<body>
    <div id="bar">
       <p>Username and Password Doesn't match</p>
        <form id="loginForm" action="login.php" method="POST">
                        <fieldset id="body">
                            <fieldset>
                                <label for="email">Username</label>
                                <input type="text" name="uname" id="uname" />
                            </fieldset>
                           
							 <fieldset>
                                <label for="usertype">Member Type</label>
                                <select name="utype" id="usertype" >
									<option value="student">Student
									<option value="faculty" selected="selected">Faculty
									<option value="admin">Admin
                                </select>
                            </fieldset>
							 <fieldset>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" />
                            </fieldset>
                            <input type="submit" id="login" value="Sign in" />
                            <label for="checkbox"><input type="checkbox" id="checkbox" />Remember me</label>
                        </fieldset>
                        <span><a href="#">Forgot your password?</a></span>
                    </form>
              
			
				
 </div>
 </body>
</html>
