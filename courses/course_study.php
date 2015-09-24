<?php require_once('../Connections/con1.php'); ?>
<?php
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
session_start();
$id=$_GET['col1'];
mysql_select_db($database_con1, $con1);
$query_Recordset1 = "SELECT * FROM course where c_id='$id'";
$Recordset1 = mysql_query($query_Recordset1, $con1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIIT Connect</title>
</head>

<body>
<?php

$scode=$row_Recordset1['shortcode'];
$dept=$row_Recordset1['dept_id'];

$folder="studymaterial";
if(isset($_GET['col2']))
	$folder=$_GET['col2'];
?>
<table width="1081" border="0">
  <tr>
    <td><table width="671" border="0">
      <tr>
        <td width="160"><a href="course_study.php?col1=<?php echo $id;?>&col2=studymaterial">Study Material</a></td>
        <td width="160"><a href="course_study.php?col1=<?php echo $id;?>&col2=tutorials">Tutorial Sheets</a></td>
        <td width="160"><a href="course_study.php?col1=<?php echo $id;?>&col2=assignments">Assignments</a></td>
        <td width="160"><a href="course_study.php?col1=<?php echo $id;?>&col2=ebooks">E-books</a></td>
      </tr>
    </table></td>
    <td width="394" rowspan="2"><p>Important Links</p>
    <p><iframe src="../crawler/crawl.php?col=<?php echo $id;?>" width="250" height="600" scrolling="auto"></iframe>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="671">
    Location:<?php echo $dept."/".$scode."/".$folder;?>
    <iframe src="../fms/fms_test.php?col=sm/<?php echo $dept."/".$scode."/".$folder."/";?>" width="660" height="500">--></iframe>
    
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
