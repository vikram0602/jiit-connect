
</head>

<body>
<?php
include_once("facultyaccount.php");
$root="sm";
if(isset($_GET['col']))
	$root=$_GET['col'];
?>
<iframe src="../fms/fms_test.php?col=<?php echo $root;?>" width="500" height="600"> </iframe>

</body>
</html>