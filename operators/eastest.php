<!--
 - PHP Document
 - Copyright 2011 
 - Stephen Bush 
 - trininox@gmail.com 
 - Version 0.4.21
 - Includes jQuery.js
-->
<?php  
  
    require ("../function_connect.php");  
  
    // CLIENT INFORMATION  
	$mysql_date			= date('Y-m-d H:i:s');
	$date 			= date('Y-m-d');
	$time 			= date('H:i:s');
    $eas_type		= htmlspecialchars(trim($_POST['eas_type']));  
    $eas_station	= htmlspecialchars(trim($_POST['eas_station']));  
  	$eas_time		= htmlspecialchars(trim($_POST['eas_time']));
	$eas_from		= htmlspecialchars(trim($_POST['eas_from']));
	$initials		= htmlspecialchars(trim($_POST['initials']));
	
    $addEntry  = "INSERT INTO logs (station,report_date,report_update,eas_type,eas_from,initials) VALUES ('$eas_station','$date $eas_time','$mysql_date','$eas_type','$eas_from','$initials')";  
	
    mysql_query($addEntry) or die(mysql_error());  
  
?>