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

mysql_select_db($database_con1, $con1);
$query_Recordset1 = "SELECT * FROM student_details";
$Recordset1 = mysql_query($query_Recordset1, $con1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_con1, $con1);
$query_Recordset2 = "SELECT * FROM faculty_details where username='".$_GET['col']."'";
$Recordset2 = mysql_query($query_Recordset2, $con1) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">

body p {
	text-align: center;
}
#form1 {
	text-align: center;
}
#form2 input {
	text-align: justify;
}
#tabl {
	text-align: left;
}
</style>
</head>
<title>JIIT CONNECT</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/minor/css/style.css" type="text/css" media="screen">
<script src="/minor/js/jquery.min.js">
</script>
<script src="/minor/js/left.js">
</script>
</head>

<body>
<?php include("template.php"); ?>
<style>
#heading
{
	font-size:16px;
	text-align:left;
	opacity:1;
	color:#000;
	/*padding:20px;*/
	
}
#content
{
	font-size:16px;
	text-align:center;
	opacity:1;
	color:#000;
	/*padding:16px;*/
}
#tabl
{
	background-color:#F90;
	color:#00F;
	opacity:.7;
	
	
}
#tabl2
{
	background-color:#F90;
	color:#00F;
	opacity:.7;
}


</style>
<table width="889" height="439" border="0">
  <tr>
    <td id="tabl" bordercolor="#990033"  width="348" height="180" align="justify"><img style="border:2px solid black;" src="../faculty/<?php echo $row_Recordset2['imgurl']; ?>" /></td>
    <td width="531"><table width="250" height="60" border="1" align="left" cellpadding="0" cellspacing="0" id="tabl">
      <tr>
        <td width="247" id="tabl"><ul>
          <li id ="heading">Name</li>
        </ul></td>
        <td id="content" width="175"><p><?php echo $row_Recordset2['Firstname']; ?><?php echo $row_Recordset2['middle_name']; ?><?php echo $row_Recordset2['Lastname']; ?></p></td>
        </tr>
      <tr>
        <td id="tabl"><ul>
          <li id ="heading">Enroll</li>
        </ul></td>
        <td id="content"><?php echo $row_Recordset2['username']; ?></td>
        </tr>
      <tr>
        <td id="tabl"><ul>
          <li id ="heading">Department</li>
        </ul></td>
        <td id="content"><?php echo $row_Recordset2['department']; ?></td>
      </tr>
      <tr>
        <td id="tabl"><ul>
          <li id ="heading">Designation</li>
        </ul></td>
        <td id="content"><?php echo $row_Recordset2['designation']; ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td  height="190" colspan="2"><table id="tabl" width="606" height="182" border="0">
      <tr>
        <td id="tabl2" width="344"><p id ="heading">Contact Information</p>
          <table width="343" height="78" border="1" cellpadding="0" cellspacing="0">
            <tr id="content">
              <td width="126"><ul>
                <li>Contact</li>
                </ul></td>
              <td width="260"><?php echo $row_Recordset2['contact_no']; ?></td>
            </tr>
            <tr id="content">
              <td><ul>
                <li>Email Id</li>
              </ul></td>
              <td><?php echo $row_Recordset2['email_id']; ?></td>
            </tr>
          </table>
          <p>&nbsp;</p>
          <p><br />
          </p></td>
        <td width="242"><p id ="content">Description</p>
          <p id="content"><?php echo $row_Recordset2['description']; ?></p></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="59" colspan="2"><table width="200" border="0" align="center">
      <tr>
        <td width="98" height="46"><form id="form1" name="form1" method="post" action="edit-faculty.php?col=<?php echo $row_Recordset2['username']; ?>">
          <input type="submit" name="edit" id="edit" value="EDIT" />
        </form></td>
        <td width="86"><form id="form2" name="form2" method="post" action="delete-faculty.php?col=<?php echo $row_Recordset2['username']; ?>">
          <input name="delete" type="submit" value="DELETE" />
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
