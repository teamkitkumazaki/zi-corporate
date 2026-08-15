<!doctype html>
<?php if(isset($_GET['url'])) { $url = $_GET['url']; }?>
<?php
	$recirect = 'https://www.srush.co.jp/completed?dlurl='.$url;
	header("Location:$recirect");
	exit();
?>
<html style="display: none;">
<head>
	<meta name="robots" content="noindex,nofollow" />
</head>
<body>
</body>
</html>
