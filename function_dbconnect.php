<!--
 - PHP Document
 - Copyright 2011 
 - Stephen Bush 
 - trininox@gmail.com 
 - Version 0.4.21
 - Includes jQuery.js
-->
<?php
date_default_timezone_set('America/Fort_Wayne'); 
/*Define constant to connect to database */
DEFINE('DATABASE_USER', 'root');
DEFINE('DATABASE_PASSWORD', '');
DEFINE('DATABASE_HOST', 'localhost');
DEFINE('DATABASE_NAME', 'eas_reports');

// Make the connection:
$dbc = @mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD,
 DATABASE_NAME);

if (!$dbc) {
 trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
}
?>