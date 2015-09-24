<?php
$root=$_GET['col1'];
$file=$_GET['col2'];
function rmdir_recursive($dir) {
	if(is_dir($dir))
	{
		foreach(scandir($dir) as $file) {
			if ('.' === $file || '..' === $file) continue;
			if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
				else unlink("$dir/$file");
		}
		rmdir($dir);
	}
	else
		unlink("$dir");
}
rmdir_recursive($root.'/'.$file);
header("location:../fms/fms_test.php?col=".$root);
?>