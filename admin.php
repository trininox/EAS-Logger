<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Admin</title>
</head>

<body>
<div id="top" name="top">
<?php 	

		require('admin_operators.php');
?>
</div>
<div id="middle" name="middle">
<?php
		require('admin_review.php');
?>
</div>
<div id="bottom" name"bottom">
<?php
		require('admin_search.php');
?>
</div>
</body>
</html>