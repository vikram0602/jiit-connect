<?php require_once('../Connections/con1.php'); ?>
<?php
session_start();
$id="none";
if(isset($_GET['col']))
	$id=$_GET['col'];

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
$query_Recordset1 = "SELECT * FROM course where c_id='$id'";
$Recordset1 = mysql_query($query_Recordset1, $con1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_con1, $con1);
$query_Recordset2 = "SELECT username,Firstname, middle_name, Lastname FROM faculty_details where username in(select username from faculty_course where c_id='$id') ";
$Recordset2 = mysql_query($query_Recordset2, $con1) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_con1, $con1);
$query_Recordset3 = "SELECT * FROM course_student where username='".$_SESSION['CurrentUser']."' and c_id='$id'";
$Recordset3 = mysql_query($query_Recordset3, $con1) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="899" height="460">
  <tr>
    <td width="463" height="178"><img src="<?php echo $row_Recordset1['imgurl']; ?>" height="175" width="300"/></td>
    <td width="424"><table width="317" height="148" >
      <tr>
        <td width="150" height="34">Sub Name</td>
        <td width="510"><?php echo $row_Recordset1['c_name']; ?></td>
      </tr>
      <tr>
        <td height="36">Sub Code</td>
        <td><?php echo $row_Recordset1['c_id']; ?></td>
      </tr>
      <tr>
        <td height="32">Dept Id</td>
        <td><?php echo $row_Recordset1['dept_id']; ?></td>
      </tr>
      <tr>
        <td height="34">Credits</td>
        <td><?php echo $row_Recordset1['credit']; ?></td>
      </tr>
    </table></td>
 
  </tr>
  <tr>
    <td height="124" colspan="2"><p>&nbsp;</p>
      <table width="811" height="57" border="0">
        <tr>
          <td><strong>Description:</strong></td>
          <td>&nbsp;</td>
          <td><strong>Associated Faculty:</strong>                    
        <tr>
          <td width="414"><br />
          <?php echo $row_Recordset1['description']; ?></td>
          <td width="42">&nbsp;</td>
          <td width="341"><p>
            <?php do { 
			$name=$row_Recordset2['Firstname']." ".$row_Recordset2['Lastname'];
            echo $name."<br>";
              
              } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
            </p>
            <table width="327" >
              <tr> 
              <?php if(!$row_Recordset3['username'])
			  {
               echo' <td><form id="form1" name="form1" method="get"  action="subscribe.php">
                  <input name="col1" type="hidden" value="'.$id.'" />
				  <input type="submit" name="subscribe" id="subscribe" value="Subscribe" />
				 
                </form></td>';
			  }
			   if($row_Recordset3['username'])
			  {
			    echo'<td><form id="form2" name="form2" method="get" action="unsubscribe.php">
				  <input name="col1" type="hidden" value="'.$id.'" />
                  <input type="submit" name="unsub" id="unsub" value="Unsubscribe" />
                </form></td>';
			  }
			   if($row_Recordset3['username'])
			  {
				echo'<td><form id="form3" name="form3" method="get" action="course_study.php">
				  <input name="col1" type="hidden" value="'.$id.'" />
                  <input type="submit" name="view" id="view" value="Study" />
                </form></td>';
			  }
			  ?>
              </tr>
            </table>
            <p><br />
            </p>
            <p>&nbsp; </p>
          </table></td>
        </tr>
      </table>
    <p>&nbsp;</p></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td> </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
mysql_free_result($Recordset2);

mysql_free_result($Recordset3);
?>
