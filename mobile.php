<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<link href="css/mobilestyle.css" rel="stylesheet" type="text/css" />
<?php
require_once ('function_connect.php');
##require_once ('functions.php');
## include('operators/lpcheck.php');
## include('operators/eastest.php');
## include('operators/selftest.php');
## include('operators/towerlights.php');
## include('operators/failure.php');
## include('operators/chiefsreview.php');
$date = date('Y-m-d');
$time = date('H:i:s');
$datedtime = date("l \\t\h\e jS \of F Y \@ H:i:s");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $datedtime; ?> EST</title>

</head>
<body>
<p class="header">Report for <?php echo $datedtime; ?> EST   Current Time: <span id="clock" name="clock"><?php include('function_clock.php'); ?></span> EST</p>
<button class="buttons" id="openall">Expand All</button>
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
<input id="report_date" class="text" name="report_date" size="20" type="text" value="<?php echo $date; ?>" onFocus="clearDefault(this)" maxlength="10">
<label for="eas_lp1">LP-1:</label>
<input id="eas_lp1" class="text" name="eas_lp1" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
<label for="eas_lp2">LP-2:</label>
<input id="eas_lp2" class="text" name="eas_lp2" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
<label for="eas_inet">I-NET:</label>
<input id="eas_inet" class="text" name="eas_inet" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
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
<select id="eas_type" name="eas_type">
<option value="RWT">RWT</option>
<option value="RMT">RMT</option>
<option value="WX">WX</option>
<option value="AMBER">AMBER</option>
<option value="OTHER">OTHER</option>
</select>
<label for="eas_time">Aired at Time:</label>
<input id="eas_time" class="text" name="eas_time" size="20" type="text" value="<?php echo $time; ?>" onFocus="clearDefault(this)" maxlength="8">
<label for="eas_from">From:</label>
<input id="eas_from" class="text" name="eas_from" size="20" type="text" value="WAJI" onFocus="clearDefault(this)" style="color:#CCC" maxlength="6">
<label for="eas_initials">Initials:</label>
<input id="eas_initials" class="text" name="eas_initials" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
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
<select id="self_type" name="self_type">
<option value="RWT">RWT</option>
<option value="RMT">RMT</option>
<option value="WX">WX</option>
<option value="AMBER">AMBER</option>
<option value="OTHER">OTHER</option>
</select>
<label for="self_time">Aired at Time:</label>
<input id="self_time" class="text" name="self_time" size="20" type="text" value="<?php echo $time; ?>" onFocus="clearDefault(this)" maxlength="8">
<label for="self_initials">Initials:</label>
<input id="self_initials" class="text" name="self_initials" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
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
<option value="WMYD">WMYD</option>
</select>
<label for="tower_date">Date:</label>
<input id="tower_date" class="text" name="tower_date" size="20" type="text" value="<?php echo $date; ?>" onFocus="clearDefault(this)" maxlength="10">
<label for="tower_time">Time:</label>
<input id="tower_time" class="text" name="tower_time" size="20" type="text" value="<?php echo $time; ?>" onFocus="clearDefault(this)" maxlength="8">
<label for="tower_status">Status:</label>
<input id="tower_status" class="text" name="tower_status" size="20" type="text" value="Good" onfocus="clearDefault(this)">
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
<?php include('operators/functions.php'); ?>
</div>
<div id="failsuccess" class="success" style="display:none;">Entry Added Successfully.</div>
<div id="chiefsreview">

</div>


</body>
</html>