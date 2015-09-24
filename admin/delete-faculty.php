<?php require_once('../Connections/con1.php'); ?>
<?php
include("template.php");
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

if ((isset($_GET['col'])) && ($_GET['col'] != "")) {
  $deleteSQL = sprintf("DELETE FROM faculty_details WHERE username=%s",
                       GetSQLValueString($_GET['col'], "text"));
  $deleteSQL1 = sprintf("DELETE FROM login WHERE username=%s",
                       GetSQLValueString($_GET['col'], "text"));

  mysql_select_db($database_con1, $con1);
  $Result1 = mysql_query($deleteSQL, $con1) or die(mysql_error());
  $Result1 = mysql_query($deleteSQL1, $con1) or die(mysql_error());

  $deleteGoTo = "record-added.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/minor/css/style.css" type="text/css" media="screen">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIIT CONNECT</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/minor/css/style.css" type="text/css" media="screen">
<script src="/minor/js/jquery.min.js">
</script>
<script src="/minor/js/left.js">
</script>
<style>

<body>
</body>
</html>