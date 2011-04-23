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
    $self_type		= strtoupper(htmlspecialchars(trim($_POST['self_type'])));  
    $self_station	= strtoupper(htmlspecialchars(trim($_POST['self_station'])));  
  	$self_time		= htmlspecialchars(trim($_POST['self_time']));
	$initials		= strtoupper(htmlspecialchars(trim($_POST['initials'])));
	$self_error		= htmlspecialchars(trim($_POST['self_error']));
	$self_aired		= htmlspecialchars(trim($_POST['self_aired']));
	
    $addEntry  = "INSERT INTO logs (station,report_date,report_update,eas_aired,eas_error,self_type,initials) VALUES ('$self_station','$date $self_time','$mysql_date','$self_aired','$self_error','$self_type','$initials')";  
	
    mysql_query($addEntry) or die(mysql_error());  
  
?>