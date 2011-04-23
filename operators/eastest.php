<!--
 - PHP Document
 - Copyright 2011 
 - Stephen Bush 
 - trininox@gmail.com 
 - Version 0.4.22
 - Includes jQuery.js
-->
<?php  
  
    require ("../function_connect.php");  
  
    // CLIENT INFORMATION  
	$mysql_date		= date('Y-m-d H:i:s');
	$date 			= date('Y-m-d');
	$time 			= date('H:i:s');
    $eas_type		= strtoupper(htmlspecialchars(trim($_POST['eas_type'])));  
    $eas_station	= strtoupper(htmlspecialchars(trim($_POST['eas_station'])));  
  	$eas_time		= htmlspecialchars(trim($_POST['eas_time']));
	$eas_from		= strtoupper(htmlspecialchars(trim($_POST['eas_from'])));
	$initials		= strtoupper(htmlspecialchars(trim($_POST['initials'])));
	$eas_error		= htmlspecialchars(trim($_POST['eas_error']));
	$eas_aired		= htmlspecialchars(trim($_POST['eas_aired']));
	
    $addEntry  = "INSERT INTO logs (station,report_date,report_update,eas_type,eas_aired,eas_error,eas_from,initials) VALUES ('$eas_station','$date $eas_time','$mysql_date','$eas_type','$eas_aired','$eas_error','$eas_from','$initials')";  
	
    mysql_query($addEntry) or die(mysql_error());  
  
?>