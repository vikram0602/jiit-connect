<head>
  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="js/jquery.leanModal.min.js"></script>
</head>


<script type="text/javascript">
$(function(){
  /*$('#loginform').submit(function(e){
    return false;
  });
  */
  $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
});
$(function(){
  /*$('#loginform').submit(function(e){
    return false;
  });
  */
  $('#modaltrigger1').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
});
$(function(){
  /*$('#loginform').submit(function(e){
    return false;
  });
  */
  $('#modaltrigger2').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
});
</script>
	<?php
	session_start();
	$temp=" ";
		function get_file_extension($file_name) {
	return substr(strrchr($file_name,'.'),1);
}
			function view_dir_full($root)
			{
				$a=0;
				if(is_dir($root))
				{
					if($dh=opendir($root))
					{
						echo "<table >";
						while (($file = readdir($dh)) !== false)
						{
							if(!($file=="."||$file==".."))
							{
								if(is_dir($root."/".$file))
								{
									global $temp;
									$temp=$file;

									echo '<tr><td><a href="http://localhost/minor/fms/fms_test.php?col='.$root."/". str_replace(" ","%20",$file).'"><img src="../img/folder.png" width="25" height="25" border="0" alt="directory:">' . $file.'</a>';
									if($_SESSION['CurrentUserType']=="admin" ||$_SESSION['CurrentUserType']=="faculty")
									{
										echo '&nbsp;&nbsp;&nbsp;</td><td><a href="delete_dir.php?col1='.$root.'&col2='.$file.'"><img src="../img/delete.png" width="10" height="10" border="0" alt=""></a>&nbsp;&nbsp;&nbsp;</td><td>';
									}
									$a++;
									
								}
								else
								{
									$str=$file;
									if(strlen($str)>13)
									{
										$str=substr($str,0,15);
										$str=$str."...";
									}
									$info = get_file_extension($file);
									if($info=="pdf")
									{
										echo '<tr><td><img src="../img/filetype_pdf.png" width="25" height="25" border="0" alt=""><a href="'.$root.'/'.$file.'" target="_blank">' .$str.'</a>';
										if($_SESSION['CurrentUserType']=="admin" ||$_SESSION['CurrentUserType']=="faculty")
										{
										echo'&nbsp;&nbsp;&nbsp;</td><td><a href="delete_dir.php?col1='.$root.'&col2='.$file.'"><img src="../img/delete.png" width="10" height="10" border="0" alt=""></a></td></tr><br>';
										}
										$a++;
									}
									else if($info=="docx")
									{
										echo '<tr><td><img src="../img/docx.png" width="25" height="25" border="0" alt=""><a href="'.$root.'/'.$file.'"target="_blank">'.$str.'</a>';
										if($_SESSION['CurrentUserType']=="admin" ||$_SESSION['CurrentUserType']=="faculty")
										{
										echo'</a>&nbsp;&nbsp;&nbsp;</td><td><a href="delete_dir.php?col1='.$root.'&col2='.$file.'"><img src="../img/delete.png" width="10" height="10" border="0" alt=""></a></td></tr><br>';
										}
										$a++;
									}
							
								}
							}
									
						}
							closedir($dh);
				
					}
				}
				echo '</table>';
			}
	
	
			if(isset($_GET['col'])){
			$root=$_GET['col'];
		if($_SESSION['CurrentUserType']=="admin" ||$_SESSION['CurrentUserType']=="faculty")
		{
			echo '<table><tr><td ><a href="http://localhost/minor/fms/fms_test.php?col=sm">Home</a></td>
			<td><a href="#loginmodal" id="modaltrigger">Create Folder</a></td>
			<td><a href="#loginmodal1" id="modaltrigger1">upload File</a></td></tr></table>';
		}
		view_dir_full($root);}
	?>
	<body>

  

  <div id="loginmodal" style="display:none;">
    <form id="loginform" name="loginform" method="post" action="create_folder.php">
      <label for="username">Folder Name:</label>
      <input type="text" name="name" id="username" class="txtfield" tabindex="1">
	  <input type="hidden" name="root" value="<?php echo $root; ?>">

     
      <div class="center"><input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="Create" tabindex="3"></div>
    </form>
</div>
<div id="loginmodal1" style="display:none;">
	<form action="upload_ac.php" method="post" enctype="multipart/form-data"id="loginform1">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="hidden" name="root" value="<?php echo $root; ?>">
<input type="submit" name="submit" value="Submit">
</form>
  </div>
<div id="loginmodal2" style="display:none;">
    <form id="loginform2" name="loginform2" method="post" action="rename.php">
      <label for="username">New Name:</label>
      <input type="text" name="name" id="username" class="txtfield" tabindex="1">
	  <input type="hidden" name="root" value="<?php echo $root; ?>">
	    <input type="hidden" name="file" value="<?php echo $temp; ?>">
     
      <div class="center"><input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="Create" tabindex="3"></div>
    </form>
</div>
		</body>
	
