<?php
$root=$_POST['root'];
session_start();
$allowedExts = array("gif", "jpeg", "jpg", "png","pdf","doc","c","cpp","java","xls","txt","xml","zip","rar");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (/*(($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&&*/ ($_FILES["file"]["size"] < 20000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "error uploading file <br>";
    }
  else
    {

    if (file_exists($_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
        move_uploaded_file($_FILES["file"]["tmp_name"],
         $root."/".$_FILES["file"]["name"]);
		 /*---------------------Update notice-----------------------*/
		 require_once('../Connections/con1.php'); 
		 $username=$_SESSION['CurrentUser'];
		 $username1=$_SESSION['CurrentUserName'];
		 $file1=$root."/".$_FILES["file"]["name"];
		 $file="../fms/".$file1;
		 $p1="This is to notify that Study material is updated<br>";
		 $p2= '<a href='.$file.'> '.$_FILES['file']['name'].'</a> File Uploaded in '.$root.'</a>';
		 $post=$p1.$p2;
		 $con=mysqli_connect($hostname_con1,$username_con1,$password_con1,$database_con1);
		 if (mysqli_connect_errno($con))
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
		else
		{
			echo $username.$username1.$post;
			$date=date("Y-m-d");
		 $result=mysqli_query($con,"Insert into news (username,post,date,name)values('".$username."',
		 '$post','".$date."','".$username1."')");
		 /*--------------------------------------------*/
		 header("location:../fms/fms_test.php?col=".$root);
		}
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>