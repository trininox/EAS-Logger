<!--
 - PHP Document
 - Copyright 2011 
 - Stephen Bush 
 - trininox@gmail.com 
 - Version 0.4.26
 - Includes jQuery.js
-->
<?php

	require ('../function_dbconnect.php');

if(isset($_GET['fromdate'])){
    $fromdate = 	htmlspecialchars(trim($_GET['fromdate']));	
	$mystation = 	htmlspecialchars(trim($_GET['mystation']));
	$todate = 	htmlspecialchars(trim($_GET['todate']));	
	$review_notes = 	htmlspecialchars(trim($_GET['review_notes']));	
	$chief_initials = 	htmlspecialchars(trim($_GET['chief_initials']));	
	$todate = date('Y-m-d H:i:s');



$query = "UPDATE  `eas_reports`.`logs` SET  
`chief_review` =  '$review_notes',
`chief_designated` =  '$chief_initials',
`chief_date` =  '$todate' WHERE `logs`.`station` =  '$mystation' AND `logs`.`report_date` BETWEEN '$fromdate' AND NOW()";
mysqli_query($dbc,$query) or die(mysql_error());

}else {
    echo 'Parameter Missing';
}




?>