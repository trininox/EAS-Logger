<!DOCTYPE HTML>
<!--
 - PHP Document
 - Copyright 2011 
 - Stephen Bush 
 - trininox@gmail.com 
 - Version 0.4.30
 - Includes jQuery.js
-->
<html>
<?php
require_once ('../function_connect.php');

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>EAS Report</title>

<link href="..css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="lpcheck">
<?php
$result = mysql_query("SELECT * FROM logs ORDER BY report_update DESC LIMIT 1") or die (mysql_error());
echo "<table border='1'>";
echo "<tr>
	<th>index</th>
	<th>station</th>
	<th>report_date</th>
	
	<th>initials</th>
	<th>eas_lp1</th>
	<th>eas_lp2</th>
	<th>eas_inet</th>
	<th>eas_type</th>
	

	<th>eas_from</th>
	<th>self_type</th>
	<th>eas_aired</th>
	<th>eas_error</th>

	<th>tower_status</th>
	<th>tower_fail</th>
	<th>tower_fss</th>
	<th>fss_notified</th>
	<th>fss_notam_assign</th>
	<th>fss_initials</th>
	<th>fss_cleared</th>
	<th>fss_cancelled</th>
	<th>fss_cancelled_initials</th>
	
	</tr>
	";
while($r=mysql_fetch_array($result))
{	
   //the format is $variable = $r["nameofmysqlcolumn"];
   
   $index=$r["index"];
   $station=$r["station"];
   $report_date=$r["report_date"];

   $initials=$r["initials"];
   $eas_lp1=$r["eas_lp1"];
   $eas_lp2=$r["eas_lp2"];
   $eas_inet=$r["eas_inet"];
   $eas_type=$r["eas_type"];   

   $eas_from=$r["eas_from"];
   $self_type=$r["self_type"];
   $eas_aired=$r["eas_aired"];
   $eas_error=$r["eas_error"];
 

   $tower_status=$r["tower_status"];
   $tower_fail=$r["tower_fail"];
   $tower_fss=$r["tower_fss"];
   $fss_notified=$r["fss_notified"];
   $fss_notam_assign=$r["fss_notam_assign"];
   $fss_initials=$r["fss_initials"];
   $fss_cleared=$r["fss_cleared"];
   $fss_cancelled=$r["fss_cancelled"];
   $fss_cancelled_intials=$r["fss_cancelled_initials"];
   


      //display the row
   ?>  

   <tr bgcolor='white'>
   <th><?php echo $index ?></th>
   <th><?php echo $station ?></th>
   <th><?php echo $report_date ?></th>
   
   <th><?php echo $initials ?></th>
   <th><?php echo $eas_lp1 ?></th>
   <th><?php echo $eas_lp2 ?></th>
   <th><?php echo $eas_inet ?></th>
   <th><?php echo $eas_type ?></th>
   
   <th><?php echo $eas_from ?></th>
   <th><?php echo $self_type ?></th>
   <th><?php echo $eas_aired ?></th>
   <th><?php echo $eas_error ?></th>


   <th><?php echo $tower_status ?></th>
   <th><?php echo $tower_fail ?></th>
   <th><?php echo $tower_fss ?></th>
   <th><?php echo $fss_notified ?></th>
   <th><?php echo $fss_notam_assign ?></th>
   <th><?php echo $fss_initials ?></th>
   <th><?php echo $fss_cleared ?></th>
   <th><?php echo $fss_cancelled ?></th>
   <th><?php echo $fss_cancelled_intials ?></th>
   
   </tr>
   <?php 
}

?>
</table>

</div>

</body>
</html>