<style>
<style>
::-webkit-scrollbar-thumb:horizontal { height: 10px; background-color:#33363b; }
::-webkit-scrollbar-thumb:vertical { width: 10px; background-color:#33363b;
-webkit-box-shadow: 1px 1px 4px rgba(0,0,0,0.16);
-moz-box-shadow: 1px 1px 4px rgba(0,0,0,0.16);
box-shadow: 1px 1px 4px rgba(0,0,0,0.16);
}

::-webkit-scrollbar { width: 15px; height: 15px; background: #DBDBDB;
-webkit-box-shadow: inset 1px 1px 4px rgba(0,0,0,0.13);
-moz-box-shadow: inset 1px 1px 4px rgba(0,0,0,0.13);
box-shadow: inset 1px 1px 4px rgba(0,0,0,0.13); }
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<div class="scrollbar" id="style-1">
      <div class="force-overflow"></div>
  


<?php require_once('Connections/con1.php'); ?>
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
$query_events = "SELECT * FROM event";
$events = mysql_query($query_events, $con1) or die(mysql_error());
$row_events = mysql_fetch_assoc($events);
$totalRows_events = mysql_num_rows($events);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Converge 2014</title>
<script>
function myFunction()
{
  
  var x=document.getElementById("event");
  var p=x.options[x.selectedIndex].value;
  var res=p.split("+");
  var details="";
  var y=res[0];
  if(y>1){
  var i=1;
  details="<center><h2>Remaining Players Details<h2></center><table><tr><td>Name</td><td>D.O.B</td><td>Contact No.</td><td>Email</td><td>Gender</td></tr>";
  for(i=1;i<y;i++)
  {
	var n="name"+i;
	var e="email"+i;
	var c="contact"+i;
	var d="dob"+i;
	var g="gender"+i;
  	details=details+'<tr><td><input name="name'+i+'" type="text" /></td><td><input name="dob'+i+'" type="date" /></td><td><input name="contact'+i+'" type="text" /></td><td><input name="email'+i+'" type="email" /></td><td><select name="gender'+i+'"><option value="male">Male</option><option value="female">Female</option></select></td></tr>';
  }
 details=details+"</table>";}
  document.getElementById("details").innerHTML=details;

}
</script>
</head>


<body>
<form id="form1" name="form1" method="post" action="save-data.php">
  <fieldset>
  <legend> Event Registration Form</legend>



    <label for="event"><br />
    </label>  
  <table width="609">
    <tr>
      <td width="141">Select Event</td>
      <td width="452"><select name="event" id="event" onBlur="myFunction()" onChange="myFunction()"><option value="0">Select Event</option>
        <?php

while($row_events = mysql_fetch_assoc($events))
{
   echo' <option value="'.$row_events['no_of_participants']."+".$row_events['id'].'">'.$row_events['name'].'</option>';
}?>
<input name="id" type="hidden" value="" />
      </select></td>
    </tr>
  </table>
  <table width="608">
      <tr>
        <td width="140"><label for="name">Name</label></td>
        <td width="150"><span id="sprytextfield1">
          <input type="text" name="name" id="name" />
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
        <td width="140"><label for="college">College/University</label></td>
        <td width="150"><span id="sprytextfield2">
          <input type="text" name="college" id="college" cols="45" rows="5" />
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      </tr>
      <tr>
        <td>Primary Contact</td>
        <td><span id="sprytextfield3">
          <input type="text" name="contact" id="contact" />
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
        <td>Primary Email</td>
        <td><span id="sprytextfield4"><span id="sprytextfield6">
          <label for="email"></label>
          <input type="text" name="email" id="email" />
        <span class="textfieldRequiredMsg">A value is required.</span></span><span class="textfieldRequiredMsg">Email is required is required.</span></span></td>
      </tr>
      <tr>
        <td>Date of birth</td>
        <td><label for="dob"></label>
          <label for="dob3"></label>
          <input type="date" name="dob" id="dob" />
        </td>
        <td>Gender</td>
        <td><label for="gender"></label>
          <select name="gender" id="gender">
		  <option value="male">Male</option>
		  <option value="female">Female</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="2">Accomodation Required
          <input type="checkbox"  value="yes" checked="checked"  name="accomodation" id="accomodation" />
        <label for="accomodation"></label></td>
        <td colspan="2">Transportation Required
                <input type="checkbox" value="yes" checked="checked" name="transportation" id="transportation" />
        <label for="transportation"></label></td>
      </tr>
  </table>
    <p>
      <label for="event"><br />
      </label>
  <p id="details">***Select Event***</p>
<input name="Submit" type="submit" value="Register" />
</fieldset>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur", "change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur", "change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "date");
</script>
</body>
</html>
<?php
mysql_free_result($events);
?>
