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
$query_Recordset1 = "SELECT * FROM login where username ='".$_SESSION['CurrentUser']."'";
$Recordset1 = mysql_query($query_Recordset1, $con1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
    function myfunc () {
        var frm = document.getElementById("foo");
        frm.submit();
    }
    window.onload = myfunc;
</script>
<title>Untitled Document</title>
</head>

<body>
<?php

?>
<form action="https://webkiosk.jiit.ac.in/CommonFiles/UserAction.jsp" method="post" id="foo">
<input name="InstCode" type="hidden" value="J128" />
<input name="UserType" type="hidden" value="S" />
<input name="MemberCode" type="hidden" value="<?php echo $_SESSION['CurrentUser'];?>" />
<input name="Password" type="hidden" value="<?php echo $row_Recordset1['password']; ?>" />




</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
