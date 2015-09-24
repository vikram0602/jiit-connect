<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<?php
session_start();
if(isset($_session['uname']))
{
	?>
	<form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
    
    <input name="search" type="text" />
    <select name="type">
   <option value="uid" selected>Uid
    </select>
    
    
    </form>
	
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$search=$_POST["search"];
		$type=$_POST["type"];
		
		
		echo $type;
		echo $search;
	}
	
}
else
header("location:logout.php");
?>
<body>
</body>
</html>