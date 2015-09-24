<?php

$root=$_POST['root'];
$name=$_POST['name'];
if(is_dir($root."/".$name))
{
	echo "folder already exist";
}
else
{
	mkdir($root."/".$name);
	header("location:../fms/fms_test.php?col=".$root);
}

?>