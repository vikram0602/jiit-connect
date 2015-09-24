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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE login SET  password=%s WHERE username=%s",
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['username'], "text"));

  mysql_select_db($database_con1, $con1);
  $Result1 = mysql_query($updateSQL, $con1) or die(mysql_error());
  header("location:logout.php");
}

mysql_select_db($database_con1, $con1);
$query_Recordset1 = "SELECT * FROM login";
$Recordset1 = mysql_query($query_Recordset1, $con1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_free_result($Recordset1);
?>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Username:</td>
      <td><?php echo $row_Recordset1['username']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Usertype:</td>
      <td><select name="usertype">
        <option value="student" <?php if (!(strcmp("student", htmlentities($row_Recordset1['usertype'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>Student</option>
        <option value="faculty" <?php if (!(strcmp("faculty", htmlentities($row_Recordset1['usertype'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>Faculty</option>
        <option value="admin" <?php if (!(strcmp("admin", htmlentities($row_Recordset1['usertype'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>Admin</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Password:</td>
      <td><input type="password" name="password" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Update record"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="username" value="<?php echo $row_Recordset1['username']; ?>">
</form>
<p>&nbsp;</p>
