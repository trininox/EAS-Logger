<!--
 - PHP Document
 - Copyright 2011 
 - Stephen Bush 
 - trininox@gmail.com 
 - Version 0.4.23
 - Includes jQuery.js
-->
<?php  
  
    require ("../function_connect.php");  
  
    // CLIENT INFORMATION  
	$mysql_date			= date('Y-m-d H:i:s');
	$tower_station	= strtoupper(htmlspecialchars(trim($_POST['tower_station'])));
    $tower_date		= htmlspecialchars(trim($_POST['tower_date']));  
    $tower_time		= htmlspecialchars(trim($_POST['tower_time']));  
  	$tower_status	= strtoupper(htmlspecialchars(trim($_POST['tower_status'])));
	$initials		= strtoupper(htmlspecialchars(trim($_POST['initials'])));
	
    $addEntry  = "INSERT INTO logs (station,report_date,report_update,tower_status,initials) VALUES ('$tower_station','$tower_date $tower_time','$mysql_date','$tower_status','$initials')";  
	
    mysql_query($addEntry) or die(mysql_error());  
  
?>