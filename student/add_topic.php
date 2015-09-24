<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="project"; // Database name 
$tbl_name="forum_question"; // Table name 
 session_start();
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// get data that sent from form 
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_SESSION['CurrentUserName'];
$enroll=$_SESSION['CurrentUser'];

$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO $tbl_name(topic, detail, name, username, datetime)VALUES('$topic', '$detail', '$name', '$enroll', '$datetime')";
$result=mysql_query($sql);

if($result){
echo "Successful<BR>";
//echo "<a href=main_forum.php>View your topic</a>";
}
else {
echo "ERROR";
}
mysql_close();
header("location:main_forum.php");
?>