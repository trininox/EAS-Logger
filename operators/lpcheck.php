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
	$station_lpcheck	= strtoupper(htmlspecialchars(trim($_POST['station_lpcheck'])));  
    $report_date	= htmlspecialchars(trim($_POST['report_date']));  
    $eas_lp1		= strtoupper(htmlspecialchars(trim($_POST['eas_lp1'])));  
  	$eas_lp2		= strtoupper(htmlspecialchars(trim($_POST['eas_lp2'])));
	$eas_inet		= strtoupper(htmlspecialchars(trim($_POST['eas_inet'])));
	$check_error	= htmlspecialchars(trim($_POST['check_error']));
	
    $addEntry  = "INSERT INTO logs (station,report_date,report_update,eas_lp1,eas_lp2,eas_inet,eas_error) VALUES ('$station_lpcheck','$report_date $time','$mysql_date','$eas_lp1','$eas_lp2','$eas_inet','$check_error')";  
	
    mysql_query($addEntry) or die(mysql_error());  
  
?>