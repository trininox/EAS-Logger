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
	$mysql_date			= date('Y-m-d H:i:s');
	$index	= htmlspecialchars(trim($_POST['index']));
	$fail_initials		= strtoupper(htmlspecialchars(trim($_POST['update_initials'])));
	$fail_station	= strtoupper(htmlspecialchars(trim($_POST['update_station'])));
    $tower_fail		= strtoupper(htmlspecialchars(trim($_POST['update_fail'])));  
    $tower_fss		= htmlspecialchars(trim($_POST['update_fss']));  
  	$fss_notified		= strtoupper(htmlspecialchars(trim($_POST['update_notified'])));
	$fss_notam_assign		= htmlspecialchars(trim($_POST['update_notam_assign']));
	$fss_initials		= strtoupper(htmlspecialchars(trim($_POST['update_initials'])));
	$fss_cleared			= strtoupper(strtoupper(htmlspecialchars(trim($_POST['update_cleared']))));
	$fss_cancelled			= htmlspecialchars(trim($_POST['update_cancelled']));
	$fss_cancelled_initals	= strtoupper(htmlspecialchars(trim($_POST['update_cancelled_initials'])));
	
    $addEntry  = "UPDATE  `eas_reports`.`logs` SET  `station` =  '$fail_station',
`report_update` =  '$mysql_date',
`initials` =  '$fail_initials',
`tower_fail` =  '$tower_fail',
`tower_fss` =  'off',
`fss_notified` =  '$fss_notified',
`fss_notam_assign` =  '$fss_notam_assign',
`fss_initials` =  '$fss_initials',
`fss_cleared` =  '$fss_cleared',
`fss_cancelled` =  '$fss_cancelled',
`fss_cancelled_initials` =  '$fss_cancelled_initals' WHERE  `logs`.`index` ='$index'";  
	
    mysql_query($addEntry) or die(mysql_error());  
	
?>