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
	$mysql_date		= date('Y-m-d H:i:s');
	$date 			= date('Y-m-d');
	$time 			= date('H:i:s');
    $self_type		= htmlspecialchars(trim($_POST['self_type']));  
    $self_station	= htmlspecialchars(trim($_POST['self_station']));  
  	$self_time		= htmlspecialchars(trim($_POST['self_time']));
	$initials		= htmlspecialchars(trim($_POST['initials']));
	
    $addEntry  = "INSERT INTO logs (station,report_date,report_update,self_type,self_station,initials) VALUES ('$self_station','$date $self_time','$mysql_date','$self_type','$self_station','$initials')";  
	
    mysql_query($addEntry) or die(mysql_error());  
  
?>