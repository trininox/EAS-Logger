<!DOCTYPE HTML>
<!--
 - PHP Document
 - Copyright 2011 
 - Stephen Bush 
 - trininox@gmail.com 
 - Version 0.4.28
 - Includes jQuery.js
-->
<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
set_include_path('C:/wamp/www/eas');
require_once ('function_connect.php');

$date = date('Y-m-d');
$time = date('H:i:s');
$datedtime = date("l \\t\h\e jS \of F Y \@ H:i:s");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>EAS Log <?php echo $datedtime; ?> EST</title>

</head>
<body>
<p class="header">Report for <?php echo $datedtime; ?> EST   Current Time: <span id="clock" name="clock"><?php include('function_clock.php'); ?></span> EST</p>
<!--<button class="buttons" id="openall">Expand All</button>-->
<button class="buttons" id="lpchecker">EAS Reciever Check</button>
<button class="buttons" id="eastester">Log Recieved EAS</button>
<button class="buttons" id="selftester">Log Created EAS</button>
<button class="buttons" id="towerlightser">Log Tower Lights Check</button>
<button class="buttons" id="failureer">Log Tower Light Failure</button>
<button class="buttons" id="chiefsreviewer">Last Entry Review</button>


<div id="lpcheck" class="container">
<form id="lpcheckform" method="post">
<fieldset>
<legend>Enter Reciever Check Information</legend>
<label for="station_lpcheck">Station:</label>
<select id="station_lpcheck" name="station_lpcheck">
<option value="WAOE">WAOE</option>
<option value="WEEK">WEEK</option>
<option value="WHOI">WHOI</option>
<option value="WISE">WISE</option>
<option value="WMYD">WMYD</option>
<option value="WPTA">WPTA</option>
</select>
<label for="report_date">Date:</label>
<a class="tooltip" href="#">
<input id="report_date" class="text" name="report_date" size="20" type="text" value="<?php echo $date; ?>" onFocus="clearDefault(this)" maxlength="10">
<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>Date?</em>Enter the date the check was performed in YYYY-MM-DD</span></a>
<label for="eas_lp1">LP-1:</label>
<a class="tooltip" href="#">
<input id="eas_lp1" class="text" name="eas_lp1" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>LP1?</em>Initial that the LP1 tuner of the respective DASDEC is acceptable<br> Acceptable is 60% and higher</span></a>
<label for="eas_lp2">LP-2:</label>
<a class="tooltip" href="#">
<input id="eas_lp2" class="text" name="eas_lp2" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>LP2?</em>Initial that the LP2 tuner of the respective DASDEC is acceptable<br> Acceptable is 60% and higher</span></a>
<label for="eas_inet">I-NET:</label>
<a class="tooltip" href="#">
<input id="eas_inet" class="text" name="eas_inet" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>What is I-Net?</em>This is for Fort Wayne channels only!<br>Initial if the I-Net box is showing connected EG. 32Kbps WMA<br>The I-Net box is located at the top of the DASDEC rack in MCR</span></a>
<label for="check_error">Error:</label>
<a class="tooltip" href="#">
<input id="check_error" class="check" name="check_error" size="10" type="checkbox">
<span class="custom warning"><img src="images/Warning.png" alt="Warning" height="48" width="48" /><em>Error?</em>Check this box is there was an issue with one of the tuners<br>Report this to engineering</span></a>
<button class="entry">Add Entry</button>
</fieldset>
</form>
</div>
<div id="lpsuccess" class="lpsuccess" style="display:none;">Entry Added Successfully.</div>
<div id="eastest" class="container">
<form id="eastestform" method="post">
<fieldset>
<legend>Enter Recieved EAS Information</legend>
<label for="eas_station">Station:</label>
<select id="eas_station" name="eas_station">
<option value="WAOE">WAOE</option>
<option value="WEEK">WEEK</option>
<option value="WHOI">WHOI</option>
<option value="WISE">WISE</option>
<option value="WMYD">WMYD</option>
<option value="WPTA">WPTA</option>
</select>
<label for="eas_type">EAS Type:</label>
<a class="tooltip" href="#">
<select id="eas_type" name="eas_type">
<option value="RWT">RWT</option>
<option value="RMT">RMT</option>
<option value="WX">WX</option>
<option value="AMBER">AMBER</option>
<option value="OTHER">OTHER</option>
</select>
<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>Types</em>Select the type of alert recieved<br>Required Weekly Test (RWT)<br>Required Monthly Test (RMT)<br>Weather Related, Tornado, Thunderstorm.. (WX)<br>Amber Alerts (Amber)<br>Any other kind of alert (Other)</span></a>
<label for="eas_time">Time:</label>
<a class="tooltip" href="#">
<input id="eas_time" class="text" name="eas_time" size="20" type="text" value="<?php echo $time; ?>" onFocus="clearDefault(this)" maxlength="8">
<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>Time?</em>Time the alert was decoded by the DASDEC</span></a>
<label for="eas_from">From:</label>
<a class="tooltip" href="#">
<input id="eas_from" class="text" name="eas_from" size="20" type="text" value="WAJI" onFocus="clearDefault(this)" style="color:#CCC" maxlength="6">
<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>From?</em>The station the alert was sent by<br>WAJI, WMEE, WKIX, Etc..</span></a>
<label for="eas_initials">Initials:</label>
<input id="eas_initials" class="text" name="eas_initials" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
<label for="eas_aired">Aired:</label>
<a class="tooltip" href="#">
<input id="eas_aired" class="check" name="eas_aired" size="10" type="checkbox">
<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>Aired?</em>This alert was sent to air on the selected station<br>Note the time it aired on the Discrep Report</span></a>
<label for="eas_error">Error:</label>
<a class="tooltip" href="#">
<input id="eas_error" class="check" name="eas_error" size="10" type="checkbox">
<span class="custom warning"><img src="images/Warning.png" alt="Warning" height="48" width="48" /><em>Error?</em>Check this if there was a problem related to airing this alert<br>Report this to engineering<br>Annotate this on the Discrep Report</span></a>
<button class="entry">Add Entry</button>
</fieldset>
</form>
</div>
<div id="eassuccess" class="success" style="display:none;">Entry Added Successfully.</div>
<div id="selftest" class="container">
<form id="selftestform" method="post">
<fieldset>
<legend>Enter Created EAS Information</legend>
<label for="self_station">Station:</label>
<select id="self_station" name="self_station">
<option value="WAOE">WAOE</option>
<option value="WEEK">WEEK</option>
<option value="WHOI">WHOI</option>
<option value="WISE">WISE</option>
<option value="WMYD">WMYD</option>
<option value="WPTA">WPTA</option>
</select>
<label for="self_type">EAS Type:</label>
<a class="tooltip" href="#">
<select id="self_type" name="self_type">
<option value="RWT">RWT</option>
<option value="RMT">RMT</option>
<option value="WX">WX</option>
<option value="AMBER">AMBER</option>
<option value="OTHER">OTHER</option>
</select>
<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>Types</em>Select the type of alert recieved<br>Required Weekly Test (RWT)<br>Required Monthly Test (RMT)<br>Weather Related, Tornado, Thunderstorm.. (WX)<br>Amber Alerts (Amber)<br>Any other kind of alert (Other)</span></a>
<label for="self_time">Time:</label>
<a class="tooltip" href="#">
<input id="self_time" class="text" name="self_time" size="20" type="text" value="<?php echo $time; ?>" onFocus="clearDefault(this)" maxlength="8">
<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>Time?</em>Time the alert was generated at DASDEC</span></a>
<label for="self_initials">Initials:</label>
<input id="self_initials" class="text" name="self_initials" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
<label for="self_aired">Aired:</label>
<a class="tooltip" href="#">
<input id="self_aired" class="check" name="self_aired" size="5" type="checkbox">
<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>Aired?</em>This alert was sent to air on the selected station<br>Note the time it aired on the Discrep Report</span></a>
<label for="self_error">Error:</label>
<a class="tooltip" href="#">
<input id="self_error" class="check" name="self_error" size="10" type="checkbox">
<span class="custom warning"><img src="images/Warning.png" alt="Warning" height="48" width="48" /><em>Error?</em>Check this if there was a problem related to airing this alert<br>Report this to engineering<br>Annotate this on the Discrep Report</span></a>
<button class="entry">Add Entry</button>
</fieldset>
</form>
</div>
<div id="selfsuccess" class="success" style="display:none;">Entry Added Successfully.</div>
<div id="towerlights" class="container">
<form id="towerlightsform" method="post">
<fieldset>
<legend>Enter Tower Lights Information</legend>
<label for="tower_station">Station:</label>
<select id="tower_station" name="tower_station">
<option value="WPTA">WPTA/WISE</option>
<option value="WEEK">WEEK/WAOE</option>
<option value="WHOI">WHOI</option>
</select>
<label for="tower_date">Date:</label>
<a class="tooltip" href="#">
<input id="tower_date" class="text" name="tower_date" size="20" type="text" value="<?php echo $date; ?>" onFocus="clearDefault(this)" maxlength="10">
<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>Date?</em>Enter the date the check was performed in YYYY-MM-DD</span></a>
<label for="tower_time">Time:</label>
<a class="tooltip" href="#">
<input id="tower_time" class="text" name="tower_time" size="20" type="text" value="<?php echo $time; ?>" onFocus="clearDefault(this)" maxlength="8">
<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>Time?</em>Enter the time the check was performed<br>Use military time 00:00:00</span></a>
<label for="tower_status">Status:</label>
<a class="tooltip" href="#">
<input id="tower_status" class="text" name="tower_status" size="20" type="text" value="Good" onfocus="clearDefault(this)">
<span class="custom warning"><img src="images/Warning.png" alt="Warning" height="48" width="48" /><em>Status?</em>Enter the condition of the tower lighting<br>Reminder! if a failure exists, complete the failure form as well</span></a>
<label for="tower_initials">Initials:</label>
<input id="tower_initials" class="text" name="tower_initials" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
<button class="entry">Add Entry</button>
</fieldset>
</form>
</div>
<div id="towersuccess" class="success" style="display:none;">Entry Added Successfully.
<p class="warning">DONT FORGET! If a failure has occured also log this information!</p>
</div>
</div>
<div id="failure" class="container">
<?php require_once('operators/functions.php'); ?>
</div>
<div id="failsuccess" class="success" style="display:none;">Entry Added Successfully.</div>
<div id="instructions" name="instructions" class="instructions"> </div>
<div id="wpta" name="wpta">
<iframe src="http://docs.google.com/viewer?url=http%3A%2F%2F184.18.155.20%2FEAS%2Foperators%2Fwpta.pdf&embedded=true" width="825" height="980" style="border: none; margin: 10px 10px 10px 10px;"></iframe>
</div>
<div id="week" name="week">
<iframe src="http://docs.google.com/viewer?url=http%3A%2F%2F184.18.155.20%2FEAS%2Foperators%2Fweek.pdf&embedded=true" width="825" height="980" style="border: none; margin: 10px 10px 10px 10px;"></iframe>
</div>
<div id="whoi" name="whoi">
<iframe src="http://docs.google.com/viewer?url=http%3A%2F%2F184.18.155.20%2FEAS%2Foperators%2Fwhoi.pdf&embedded=true" width="825" height="980" style="border: none; margin: 10px 10px 10px 10px;"></iframe>
</div>
<div id="chiefsreview">

</div>


</body>
</html>