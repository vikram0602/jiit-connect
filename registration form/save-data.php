<?php require_once('Connections/con1.php'); ?>
<?php


$p=$_POST['event'];
$e=explode("+",$p);
$eid=$e[1];
$college=$_POST['college'];
$name0=$_POST['name'];
$contact0=$_POST['contact'];
$email0=$_POST['email'];
$gender0=$_POST['gender'];
$dob0=$_POST['dob'];
$transportation="yes";
$accomodation="yes";
if(isset($_POST['accomodation']))
	$acomodation=$_POST['accomodation'];
if(isset($_POST['transportation']))
	$transportation=$_POST['transportation'];

$name=array();
$email=array();
$contact=array();
$gender=array();
$dob=array();
$name[0]=$name0;
$email[0]=$email0;
$gender[0]=$gender0;
$contact[0]=$contact0;
$dob[0]=$dob0;
$team=substr($name0,0,5);
$team=$team.$contact0;
for($i=1;$i<$p;$i++)
{
	$n="name".$i;
	$e="email".$i;
	$c="contact".$i;
	$g="gender".$i;
	$d="dob".$i;
	$name[$i]=$_POST[$n];
	$contact[$i]=$_POST[$c];
	$email[$i]=$_POST[$e];
	$gender[$i]=$_POST[$g];
	$dob[$i]=$_POST[$d];
}
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
$query_Recordset1 = "SELECT * FROM event where id='$eid'";
$Recordset1 = mysql_query($query_Recordset1, $con1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>converge 2014</title>
</head>
<?php
mysql_select_db($database_con1, $con1);
$c=0;
for($i=0;$i<$p;$i++)
{
	if($name[$i]!="")
	{
	$pid=substr($name[$i],0,3).substr($contact[$i],-2);
	mysql_query("insert into participant(p_id,name,dob,contact,email,gender) values('$pid','$name[$i]','$dob[$i]','$contact[$i]','$email[$i]','$gender[$i]')",$con1) or die(mysql_error());
	$c++;
	}
}
if(strlen($eid)==1)
	$eid="0".$eid;
$team=$eid.substr($contact[0],-3);
mysql_query("insert into register_event(team_id,event,college,accomodation,transportation) values('".$team."','".$eid."','".$college."','".$accomodation."','".$transportation."')",$con1) or die(mysql_error());
for($i=0;$i<$c;$i++)
{
		$pid=substr($name[$i],0,3).substr($contact[$i],-2);
	mysql_query("insert into register_participant values('".$team."','".$pid."')",$con1) or die(mysql_error());
}
?>



<body>
<h2>Registration Receipt</h2>
<table width="600" border="1">
  <tr>
    <td>Team id</td>
    <td><?php echo $team; ?></td>
    <td>Event Name</td>
<td><?php echo $row_Recordset1['name']; ?></td>
  </tr>
  <tr>
    <td>Accomodation Required</td>
    <td><?php echo $accomodation;?></td>
    <td>Transportaion Required</td>
    <td><?php echo $transportation;?></td>
  </tr>
  <tr><td>Name</td><td>Dob</td><td>contact</td><td>college</td></tr>
  <?php for($i=0;$i<$c;$i++)
  {
  	echo '<tr>'.'<td>'.$name[$i].'</td>'.'<td>'.$dob[$i].'</td>'.'<td>'.$contact[$i].'</td>'.'<td>'.$college.'</td>'.'</tr>';
  }
  ?>
</table>



<p id="receipt"><button onclick="myFunction()">Print Receipt</button></p>

<script>
function myFunction()
{
	 document.getElementById("receipt").innerHTML="";
window.print();
}
</script>
</body>
</html><?php
mysql_free_result($Recordset1);
?>