<?php require_once('../Connections/con1.php'); ?>
<?php include("template.php"); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO student_details (username, firstname, middlename, lastname, emailid, contact, branch, `year`, batch, gender) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['firstname'], "text"),
                       GetSQLValueString($_POST['middlename'], "text"),
                       GetSQLValueString($_POST['lastname'], "text"),
                       GetSQLValueString($_POST['emailid'], "text"),
                       GetSQLValueString($_POST['contact'], "int"),
                       GetSQLValueString($_POST['branch'], "text"),
                       GetSQLValueString($_POST['year'], "text"),
                       GetSQLValueString($_POST['batch'], "text"),
                       GetSQLValueString($_POST['gender'], "text"));
$pass=rand();
$insertSQL1=sprintf("insert into login values(%s,'student',$pass)", GetSQLValueString($_POST['username'], "text"));
  mysql_select_db($database_con1, $con1);
  $Result1 = mysql_query($insertSQL, $con1) or die(mysql_error());
  $Result2 = mysql_query($insertSQL1, $con1) or die(mysql_error());
$email=GetSQLValueString($_POST['emailid'], "text");
	if($Result1 && $Result2)
	{
			$to=$email;

			$subject="User Registered on JIIT Connect";

			// From
			$header="from: gaurav_admin<gd.jiit@gmail.com>";

			// Your message	
			$message="Your Account Has been Created on JIIT CONNECT  Welcome to The Hub..!!\r\n";
			$message.="Username:".GetSQLValueString($_POST['Username'], "text");
			$message.="Password:".$password;

			// send email
			$sentmail = mail($to,$subject,$message,$header);

	}
  $insertGoTo = "record-added.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIIT CONNECT</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/minor/css/style.css" type="text/css" media="screen">
<script src="/minor/js/jquery.min.js">
</script>
<script src="/minor/js/left.js">
</script>
</head>

<body>
<br>
<h1>Add New Student</h1><br>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Username:</td>
      <td><span id="sprytextfield2">
        <input type="text" name="username" value="" size="32" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Firstname:</td>
      <td><span id="sprytextfield3">
        <input name="firstname" type="text" class="expand1" value="" size="32" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Middlename:</td>
      <td><span id="sprytextfield6">
        <input type="text" name="middlename" value="  " size="32" />
</span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Lastname:</td>
      <td><span id="sprytextfield4">
        <input type="text" name="lastname" value="" size="32" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Emailid:</td>
      <td><span id="sprytextfield1">
      <input name="emailid" type="text" class="expand3" value="" size="32" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Contact:+91</td>
      <td><span id="sprytextfield5">
      <input type="text" name="contact" value="" size="32" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Branch:</td>
      <td><select name="branch">
        <option value="cse" <?php if (!(strcmp("cse", ""))) {echo "SELECTED";} ?>>CSE</option>
        <option value="ece" <?php if (!(strcmp("ece", ""))) {echo "SELECTED";} ?>>ECE</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Year:</td>
      <td><select name="year">
        <option value="Ist" <?php if (!(strcmp("Ist", ""))) {echo "SELECTED";} ?>>Ist</option>
        <option value="IInd" <?php if (!(strcmp("IInd", ""))) {echo "SELECTED";} ?>>IInd</option>
        <option value="IIIrd" <?php if (!(strcmp("IIIrd", ""))) {echo "SELECTED";} ?>>IIIrd</option>
        <option value="IVth" <?php if (!(strcmp("IVth", ""))) {echo "SELECTED";} ?>>IVth</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Batch:</td>
      <td><select name="batch">
        <option value="f1" <?php if (!(strcmp("f1", ""))) {echo "SELECTED";} ?>>F1</option>
        <option value="f2" <?php if (!(strcmp("f2", ""))) {echo "SELECTED";} ?>>F2</option>
        <option value="f3" <?php if (!(strcmp("f3", ""))) {echo "SELECTED";} ?>>F3</option>
        <option value="f4" <?php if (!(strcmp("f4", ""))) {echo "SELECTED";} ?>>F4</option>
        <option value="f5" <?php if (!(strcmp("f5", ""))) {echo "SELECTED";} ?>>F5</option>
        <option value="f6" <?php if (!(strcmp("f6", ""))) {echo "SELECTED";} ?>>F6</option>
        <option value="f7" <?php if (!(strcmp("f7", ""))) {echo "SELECTED";} ?>>F7</option>
        <option value="f8" <?php if (!(strcmp("f8", ""))) {echo "SELECTED";} ?>>F8</option>
        <option value="e1" <?php if (!(strcmp("e1", ""))) {echo "SELECTED";} ?>>E1</option>
        <option value="e2" <?php if (!(strcmp("e2", ""))) {echo "SELECTED";} ?>>E2</option>
        <option value="e3" <?php if (!(strcmp("e3", ""))) {echo "SELECTED";} ?>>E3</option>
        <option value="e4" <?php if (!(strcmp("e4", ""))) {echo "SELECTED";} ?>>E4</option>
        <option value="e5" <?php if (!(strcmp("e5", ""))) {echo "SELECTED";} ?>>E5</option>
        <option value="e6" <?php if (!(strcmp("e6", ""))) {echo "SELECTED";} ?>>E6</option>
        <option value="e7" <?php if (!(strcmp("e7", ""))) {echo "SELECTED";} ?>>E7</option>
        <option value="e8" <?php if (!(strcmp("e8", ""))) {echo "SELECTED";} ?>>E8</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Gender:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="gender" value="male" />
            Male</td>
        </tr>
        <tr>
          <td><input type="radio" name="gender" value="female" />
            Female</td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur", "change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "custom");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {isRequired:false});
</script>
</body>
</html>