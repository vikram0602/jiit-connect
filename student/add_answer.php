<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="project"; // Database name 
$tbl_name="forum_answer"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get value of id that sent from hidden field 
$id=$_POST['id'];

$a_answer=$_POST['a_answer']; 
session_start();
$username= $_SESSION['CurrentUser'];
$name= $_SESSION['CurrentUserName'];
$datetime=date("d/m/y H:i:s"); // create date and time
echo $id;
echo $username;
echo $a_answer;
echo $datetime;
echo $name;
// Insert answer 
$sql2="INSERT INTO forum_answer(question_id, a_name, a_enroll, a_answer, a_datetime) VALUES($id, '$name', $username, '$a_answer', '$datetime')";
$result2=mysql_query($sql2);
//echo "shubham";
echo $result2;
if($result2){
echo "Successful<BR>";
//echo "<a href='view_topic.php?id=".$id."'>View your answer</a>";

// If added new answer, add value +1 in reply column 
$tbl_name2="forum_question";
$sql14 = "SELECT * FROM $tbl_name WHERE question_id='$id'";
$result4 = mysql_query($sql14);
$num = mysql_num_rows($result4);
$sql3="UPDATE $tbl_name2 SET reply='$num' WHERE id='$id'";
$result3=mysql_query($sql3);
}
else {
echo "ERROR";
}
header("location:view_topic.php?id=".$id);
// Close connection
mysql_close();
?>