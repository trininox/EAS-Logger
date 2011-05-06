<!--
 - PHP Document
 - Copyright 2011 
 - Stephen Bush 
 - trininox@gmail.com 
 - Version 0.5.6
 - Includes jQuery.js
-->
<?php
	if(isset($_GET['fromdate'])){
		
	$fromdate	= htmlspecialchars(trim($_GET['fromdate']));
	$todate = date('Y-m-d', strtotime("$fromdate + 7 days"));
	
	echo $todate;
	
	}
?>