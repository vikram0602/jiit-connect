<?php
$updrec="";

$filename="";
include("studentaccount.php");
if(isset($_POST["button"]))
{

if (($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/bmp")
|| ($_FILES["file"]["type"] == "image/png")
&& ($_FILES["file"]["size"] < 20000000))
{
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else
{
if (file_exists("usersimg/" . $_FILES["file"]["name"]))
{
echo $_FILES["file"]["name"] . " already exists. ";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"],
"usersimg/" . $_FILES["file"]["name"]);
//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
$filename=$_FILES["file"]["name"];
}
}
}
else
{
echo "Invalid file";
}
$image="usersimg/".$filename;
$user=$_SESSION["CurrentUser"];
include("config.php"); 
echo $image;
echo $user;

//mysql_query("UPDATE student_details SET imgurl='$image' WHERE username=".$_SESSION['CurrentUser']);
/*$con=mysqli_connect($host,$username,$password,$database);
							if (mysqli_connect_errno($con))
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							else
							{
								$result= mysql_query("UPDATE student_details SET imgurl = '$image' WHERE username ='$user'");
							}
					mysqli_close($con);*/
$con=mysqli_connect("127.0.0.1","root","","minor");
if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

else
	{
		$querry="UPDATE student_details SET imgurl = '".$image."' WHERE username ='".$user."'";
		$result= mysql_query($querry);
		if($result)
			echo "image uploaded";
		else
			echo "image not uploaded";
	}

}



?>

<center>

<div  align="center" style="padding: 10px; text-align: left;">
<!-- body  content -->

    <table width="100%" height="462" border="0" >
  <tr>
    <td width="17%" rowspan="7" align="left" valign="top">&nbsp;</td>
    <td colspan="3" valign="top">
  <form id="edit" name="edit" method="post" action="changepic.php" enctype="multipart/form-data" ><br />
<table width="353" height="82" border="2" align="center">
  <tr>
    <td width="105" height="44">Upload Image</td>
    <td width="230">
      <input type="file" name="file" id="file" />
      </td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td><input type="submit" name="button" value="Upload Image" /></td>
  </tr>
</table>

</form>
 </td>
  </tr>
  </table>
   

</div>


