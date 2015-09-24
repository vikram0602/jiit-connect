
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIIT CONNECT</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/minor/css/style.css" type="text/css" media="screen">
<script src="/minor/js/jquery.min.js">
</script>
<script src="/minor/js/left.js">
</script>
<style>
#label
{
	font-size:15px;

}

</style>
</head>

<body>
<?php include("template.php"); ?>
<?php require_once('../Connections/con1.php'); ?>
<?php

$user=$_SESSION["CurrentUser"];

if(isset($_GET["col"]))
	$user=$_GET["col"];
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
  $updateSQL = sprintf("UPDATE student_details SET firstname=%s, middlename=%s, lastname=%s, emailid=%s, contact=%s, branch=%s, `year`=%s, batch=%s, gender=%s WHERE username=%s",
                       GetSQLValueString($_POST['firstname'], "text"),
                       GetSQLValueString($_POST['middlename'], "text"),
                       GetSQLValueString($_POST['lastname'], "text"),
                       GetSQLValueString($_POST['emailid'], "text"),
                       GetSQLValueString($_POST['contact'], "int"),
                       GetSQLValueString($_POST['branch'], "text"),
                       GetSQLValueString($_POST['year'], "text"),
                       GetSQLValueString($_POST['batch'], "text"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($_POST['username'], "text"));

  mysql_select_db($database_con1, $con1);
  $Result1 = mysql_query($updateSQL, $con1) or die(mysql_error());

  $updateGoTo = "record-added.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_con1, $con1);
$query_Recordset1 = "SELECT username, firstname, middlename, lastname, emailid, contact, branch, `year`, batch, gender FROM student_details where username='$user'";
$Recordset1 = mysql_query($query_Recordset1, $con1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php
mysql_free_result($Recordset1);
?>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table >
    <tr valign="baseline">
      <td nowrap="nowrap" id="label" align="right">Username:</td>
      <td id="label"><?php echo $row_Recordset1['username']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" id="label" align="right">Firstname:</td>
      <td><input type="text" name="firstname" value="<?php echo htmlentities($row_Recordset1['firstname'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" id="label" align="right">Middlename:</td>
      <td><input type="text" name="middlename" value="<?php echo htmlentities($row_Recordset1['middlename'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" id="label" align="right">Lastname:</td>
      <td><input type="text" name="lastname" value="<?php echo htmlentities($row_Recordset1['lastname'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" id="label" align="right">Emailid:</td>
      <td><span id="sprytextfield1">
      <input type="text" name="emailid" value="<?php echo htmlentities($row_Recordset1['emailid'], ENT_COMPAT, ''); ?>" size="32" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" id="label" align="right">Contact:</td>
      <td>
      <input type="text" name="contact" value="<?php echo htmlentities($row_Recordset1['contact'], ENT_COMPAT, ''); ?>" size="32" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" id="label" align="right">Branch:</td>
      <td><select name="branch">
        <option value="cse" <?php if (!(strcmp("cse", htmlentities($row_Recordset1['branch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>CSE</option>
        <option value="ece" <?php if (!(strcmp("ece", htmlentities($row_Recordset1['branch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>ECE</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" id="label" align="right">Year:</td>
      <td><select name="year">
        <option value="Ist" <?php if (!(strcmp("Ist", htmlentities($row_Recordset1['year'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>Ist</option>
        <option value="IInd" <?php if (!(strcmp("IInd", htmlentities($row_Recordset1['year'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>IInd</option>
        <option value="IIIrd" <?php if (!(strcmp("IIIrd", htmlentities($row_Recordset1['year'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>IIIrd</option>
        <option value="IVth" <?php if (!(strcmp("IVth", htmlentities($row_Recordset1['year'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>IVth</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap"  id="label" align="right">Batch:</td>
      <td><select name="batch">
        <option value="f1" <?php if (!(strcmp("Ist", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>F1</option>
        <option value="f2" <?php if (!(strcmp("IInd", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>F2</option>
        <option value="f3" <?php if (!(strcmp("IIIrd", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>F3</option>
        <option value="f4" <?php if (!(strcmp("IVth", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>F4</option>
         <option value="f5" <?php if (!(strcmp("Ist", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>F5</option>
        <option value="f6" <?php if (!(strcmp("IInd", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>F6</option>
        <option value="f7" <?php if (!(strcmp("IIIrd", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>F7</option>
        <option value="f8" <?php if (!(strcmp("IVth", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>F8</option>
        <option value="e1" <?php if (!(strcmp("Ist", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>E1</option>
        <option value="e2" <?php if (!(strcmp("IInd", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>E2</option>
        <option value="e3" <?php if (!(strcmp("IIIrd", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>E3</option>
        <option value="e4" <?php if (!(strcmp("IVth", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>E4</option>
         <option value="e5" <?php if (!(strcmp("Ist", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>E5</option>
        <option value="e6" <?php if (!(strcmp("IInd", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>E6</option>
        <option value="e7" <?php if (!(strcmp("IIIrd", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>E7</option>
        <option value="e8" <?php if (!(strcmp("IVth", htmlentities($row_Recordset1['batch'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>E8</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" id="label" align="right">Gender:</td>
      <td valign="baseline"><table>
        <tr>
          <td id="label"><input type="radio" name="gender" value="male" <?php if (!(strcmp(htmlentities($row_Recordset1['gender'], ENT_COMPAT, ''),"male"))) {echo "checked=\"checked\"";} ?> />
            Male</td>
        
          <td id="label"><input type="radio" name="gender" value="female" <?php if (!(strcmp(htmlentities($row_Recordset1['gender'], ENT_COMPAT, ''),"female"))) {echo "checked=\"checked\"";} ?> />
            Female</td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="username" value="<?php echo $row_Recordset1['username']; ?>" />
</form>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email", {validateOn:["blur", "change"]});

</script>
