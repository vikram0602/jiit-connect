

<?php include("studentaccount.php");
$root="sm";
if(isset($_GET['col']))
	$root=$_GET['col'];
?>
<h1>File Management System</h1>
<br>
<iframe src="../fms/fms_test.php?col=<?php echo $root; ?>" width="500" height="600"> </iframe>

</body>
</html>