<?php  
  
    require ("../function_connect.php");  
  
    // CLIENT INFORMATION  
	$mysql_date			= date('Y-m-d H:i:s');
	$index	= htmlspecialchars(trim($_POST['index']));
	$fail_initials		= htmlspecialchars(trim($_POST['fail_initials']));
	$fail_station	= htmlspecialchars(trim($_POST['fail_station']));
    $tower_fail		= htmlspecialchars(trim($_POST['tower_fail']));  
    $tower_fss		= htmlspecialchars(trim($_POST['tower_fss']));  
  	$fss_notified		= htmlspecialchars(trim($_POST['fss_notified']));
	$fss_notam_assign		= htmlspecialchars(trim($_POST['fss_notam_assign']));
	$fss_initials		= htmlspecialchars(trim($_POST['fss_initials']));
	$fss_cleared			= htmlspecialchars(trim($_POST['fss_cleared']));
	$fss_cancelled			= htmlspecialchars(trim($_POST['fss_cancelled']));
	$fss_cancelled_initals	= htmlspecialchars(trim($_POST['fss_cancelled_initials']));
	
    $addEntry  = "INSERT INTO logs (station,
	report_date,
	report_update,
	initials,
	tower_fail,
	tower_fss,
	fss_notified,
	fss_notam_assign,
	fss_initials,
	fss_cleared,
	fss_cancelled,
	fss_cancelled_initials) 
	VALUES ('$fail_station',
	'$mysql_date',
	'$mysql_date',
	'$fail_initials',
	'$tower_fail',
	'$tower_fss',
	'$fss_notified',
	'$fss_notam_assign',
	'$fss_initials',
	'$fss_cleared',
	'$fss_cancelled',
	'$fss_cancelled_initials')";  
	
    mysql_query($addEntry) or die(mysql_error());  
	

	
?>