<?php require_once('../Connections/con1.php'); ?>
<?php
session_start();
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_con1, $con1);
$sort="none";
if(isset($_GET['col']))
	$sort=$_GET['col'];
else
	$sort="all";
if($sort=="all")
{
	$query_Recordset1 = "SELECT c_id,imgurl FROM course";
}
else
{
	$query_Recordset1 = "SELECT c_id,imgurl FROM course where dept_id='".$sort."'";
	
}
$Recordset1 = mysql_query($query_Recordset1, $con1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIIT Connect</title>
<style type="text/css">
#courses {
	text-align: center;
}
img
{
	height:200px;
	width:300px;
}
img{-webkit-filter:brightness(80%);}
img:hover{-webkit-filter:brightness(110%);}
</style>
</head>

<body><table><tr>
<p><td><strong id="courses">Available Courses</td><td></strong><strong id="courses"><a href="index.php?col=all">All</a></td><td></strong><strong id="courses"><a href="index.php?col=cse">CSE</a></td><td></strong><strong id="courses"><a href="index.php?col=ece">ECE</a></td></strong></p>
</tr></table>

<table cellpadding="1" cellspacing="1">
  <tr>
  <?php
  $i=0;
   do { 
    if($i%3==0 && $i!=0)
 		echo '</tr><tr>';?>
      <td><?php echo '<a href="courses.php?col='.$row_Recordset1['c_id'].'" class="rollover"><img style="border:5px solid black;"src="'.$row_Recordset1['imgurl'].'"></a>' ?></td>
    <?php $i++;} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</tr></table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
