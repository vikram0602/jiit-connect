<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIIT || JIIT CONNECT</title>
</head>

<script src="/minor/js/jquery.min.js">
</script>
<script src="/minor/admin/script/main.js">
</script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link rel="stylesheet" href="/minor/css/style.css" type="text/css" media="screen">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include_once("template.php");
$root="sm";
if(isset($_GET['col']))
	$root=$_GET['col'];
?>
<iframe src="../fms/fms_test.php?col=<?php echo $root;?>" width="500" height="600"> </iframe>

</body>
</html>