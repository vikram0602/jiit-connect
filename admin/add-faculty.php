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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO faculty_details (username, Firstname, middle_name, Lastname, department, email_id, contact_no, dob, gender, designation) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['Firstname'], "text"),
                       GetSQLValueString($_POST['middle_name'], "text"),
                       GetSQLValueString($_POST['Lastname'], "text"),
                       GetSQLValueString($_POST['department'], "text"),
                       GetSQLValueString($_POST['email_id'], "text"),
                       GetSQLValueString($_POST['contact_no'], "int"),
                       GetSQLValueString($_POST['dob'], "date"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($_POST['designation'], "text"));
$pass=rand();
$insertSQL1=sprintf("insert into login values(%s,'faculty',$pass)", GetSQLValueString($_POST['username'], "text"));
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
<?php include("template.php"); ?>
<title>JIIT CONNECT</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/minor/css/style.css" type="text/css" media="screen">
<script src="/minor/js/jquery.min.js">
</script>
<script src="/minor/js/left.js">
</script>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Username:</td>
      <td><input type="text" name="username" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Firstname:</td>
      <td><input type="text" name="Firstname" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Middle_name:</td>
      <td><input type="text" name="middle_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Lastname:</td>
      <td><input type="text" name="Lastname" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Department:</td>
      <td><select name="department">
        <option value="cse" <?php if (!(strcmp("cse", ""))) {echo "SELECTED";} ?>>CSE</option>
        <option value="ece" <?php if (!(strcmp("ece", ""))) {echo "SELECTED";} ?>>ECE</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email_id:</td>
      <td><input type="text" name="email_id" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Contact_no:</td>
      <td><input type="text" name="contact_no" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dob:</td>
      <td><input type="date" name="dob" value="" size="32" /></td>
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
      <td nowrap="nowrap" align="right">Designation:</td>
      <td><select name="designation">
        <option value="hod" <?php if (!(strcmp("hod", ""))) {echo "SELECTED";} ?>>HOD</option>
        <option value="lecturer" <?php if (!(strcmp("lecturer", ""))) {echo "SELECTED";} ?>>Lecturer</option>
        <option value="Senior Lecturer" <?php if (!(strcmp("Senior Lecturer", ""))) {echo "SELECTED";} ?>>Sr. Lecturer</option>
        <option value="LAB Assistant" <?php if (!(strcmp("LAB Assistant", ""))) {echo "SELECTED";} ?>>LAB Assistant</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
