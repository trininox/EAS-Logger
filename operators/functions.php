<!--
 - PHP Document
 - Copyright 2011 
 - Stephen Bush 
 - trininox@gmail.com 
 - Version 0.4.28
 - Includes jQuery.js
-->
<?php
	
	require('function_connect.php');
	$date = date('Y-m-d');
	$time = date('H:i:s');
	
	$sql = "SELECT tower_fss FROM logs WHERE tower_fss = 'on'";
	$result = mysql_query($sql) or die ("Error with tower MySQL"); 
	$row = mysql_fetch_row($result); 
	$tower_fss = $row[0];

	$result = mysql_query("SELECT * FROM logs WHERE tower_fss = 'on'") or die(mysql_error()); 
	$array = mysql_fetch_array($result); 
	$index = $array['index']; 
	if ($tower_fss == NULL){
?>
    <form id="failureform" method="post">
	<fieldset>
	<legend>Enter Tower Light Failure Information <?php echo $index; ?></legend>
    <input type="hidden" name="index" value="<?php echo $index; ?>" id="index">
	<label for="fail_station">Station:</label>
	<select id="fail_station" name="fail_station" class="faildrop">
	<option value="WPTA" selected="selected">WPTA</option>
	<option value="WEEK">WEEK</option>
	<option value="WHOI">WHOI</option>
	</select>
	<label for="tower_fail">Failure Noted:</label>
	<a class="tooltip" href="#">
    <input id="tower_fail" class="textwide" name="tower_fail" size="100" type"text" value="Beacon  Out" onFocus="clearDefault(this)" style="color:#CCC">
    <span class="custom info"><img src="images/Info.png" alt="Info" height="48" width="48" /><em>Failure Notes</em>Enter the details about the lighting failure<br>Report this to engineering</span></a>
	<label for="fail_initials">Initials:</label>
	<input id="fail_initials" class="text" name="fail_initials"size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
	<label for="tower_fss">Requiring FSS Notification:</label>
	<a class="tooltip" href="#">
    <input id="tower_fss" class="check" name="tower_fss" size="10" type="checkbox">
    <span class="custom critical"><img src="images/Critical.png" alt="Critcial" height="48" width="48" /><em>Important!</em>If there is a tower light failure that lasts or will last more than 30 minutes and affects a top light
or any flashing light, regardless of position, especially "not working at all" or "top beacon not
working"</span></a>
    <select id="instruction" name="instruction" class="instruction">
    <option value="NONE">Instruction for...</option>
	<option value="WPTA">WPTA</option>
	<option value="WEEK">WEEK</option>
	<option value="WHOI">WHOI</option>
	</select>
	<br>
	<label for="fss_notified">FSS Notified:</label>
    <a class="tooltip" href="#">
	<input id="fss_notified" class="textwide" name="fss_notified"size="20" type="text">
    <span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>Notified?</em>Enter the name of the individual reporting to via the hotline</span></a>
	<label for="fss_notam_assign">NOTAM Assigned:</label>
    <a class="tooltip" href="#">
	<input id="fss_notam_assign" class="text" name="fss_notam_assign" size="20" type="text">
    <span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>NOTAM?</em>Enter the number assigned for the incident<br>Same as Antenna Structure Registration Number</span></a>
	<label for="fss_initials">Initials:</label>
	<input id="fss_initials" class="text" name="fss_initials" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
	<br>
	<label for="fss_cleared">FSS Notified Resolution:</label>
	<a class="tooltip" href="#">
    <input id="fss_cleared" class="textwide" name="fss_cleared" size="20" type="text">
    <span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>Notified?</em>Enter the name of the individual reporting the cancellation to</span></a>
	<label for="fss_cancelled">Cancelled Date:</label>
	<a class="tooltip" href="#">
    <input id="fss_cancelled" class="text" name="fss_cancelled" size="20" type="text" value="">
    <span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>Date?</em>Enter the date the incident was cancelled using YYYY-MM-DD</span></a>
	<label for="fss_cancelled_initials">Initials:</label>
	<input id="fss_cancelled_initials" class="text" name="fss_cancelled_initials" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
	<button class="entry">Add Entry</button>
	</fieldset>
	</form>
<?php
	} else {

	$result = mysql_query("SELECT * FROM logs WHERE tower_fss = 'on'") or die ("Error with index_fail"); 
	$array = mysql_fetch_array($result); 
	$index = $array['index'];
	$sql = "SELECT tower_fail FROM logs WHERE tower_fss = 'on'";
	$result = mysql_query($sql) or die ("Error with tower_fail"); 
	$row = mysql_fetch_row($result); 
	$tower_fail = $row[0];
	$sql = "SELECT initials FROM logs WHERE tower_fss = 'on'";
	$result = mysql_query($sql) or die ("Error with fail_initials"); 
	$row = mysql_fetch_row($result); 
	$fail_initials = $row[0];
	$sql = "SELECT fss_notified FROM logs WHERE tower_fss = 'on'";
	$result = mysql_query($sql) or die ("Error with fss_notified"); 
	$row = mysql_fetch_row($result); 
	$fss_notified = $row[0];
	$sql = "SELECT fss_notam_assign FROM logs WHERE tower_fss = 'on'";
	$result = mysql_query($sql) or die ("Error with fss_notam_assign"); 
	$row = mysql_fetch_row($result); 
	$fss_notam_assign = $row[0];
	$sql = "SELECT fss_initials FROM logs WHERE tower_fss = 'on'";
	$result = mysql_query($sql) or die ("Error with fss_cancelled_initials"); 
	$row = mysql_fetch_row($result); 
	$fss_initials = $row[0];
	$sql = "SELECT station FROM logs WHERE tower_fss = 'on'";
	$result = mysql_query($sql) or die ("Error with station"); 
	$row = mysql_fetch_row($result); 
	$fail_station = $row[0];
	$sql = "SELECT fss_cleared FROM logs WHERE tower_fss = 'on'";
	$result = mysql_query($sql) or die ("Error with fss_cleared"); 
	$row = mysql_fetch_row($result); 
	$fss_cleared = $row[0];
	$sql = "SELECT fss_cancelled FROM logs WHERE tower_fss = 'on'";
	$result = mysql_query($sql) or die ("Error with fss_cancelled"); 
	$row = mysql_fetch_row($result); 
	$fss_cancelled = $row[0];
	$sql = "SELECT fss_cancelled_initials FROM logs WHERE tower_fss = 'on'";
	$result = mysql_query($sql) or die ("Error with fss_cancelled_initials"); 
	$row = mysql_fetch_row($result); 
	$fss_cancelled_initials = $row[0];
	
	
	?>
	
	<form id="updateform" method="post">
	<fieldset>
	<legend>Enter Tower Light Failure Information <?php echo $index; ?></legend>
    <input id="index" class="text" name="index" type="text" value="<?php echo $index ?>" style="display:none;">
    <input type="hidden" id="index" class="text" name="index" type="text" value="<?php echo $index ?>">
	<label for="update_station">Station:</label>
	<select id="update_station" name="update_station">
	<option><?php echo $fail_station ?></option>
	</select>
	<label for="update_fail">Failure Noted:</label>
	<input id="update_fail" class="textwide" name="update_fail" size="20" type="text" value="<?php echo $tower_fail ?>" style="color:#000">
	<label for="update_initials">Initials:</label>
	<input id="update_initials" class="text" name="update_initials" size="20" type="text" value="<?php echo $fail_initials; ?>" style="color:#000">
	<label for="update_fss">Requiring FSS Notification:</label>
	<input id="update_fss" class="check" name="update_fss" size="20" type="checkbox" checked>
	<br>
	<label for="update_notified">FSS Notified:</label>
	<input id="update_notified" class="textwide" name="update_notified" size="20" type="text" value="<?php echo $fss_notified; ?>">
	<label for="update_notam_assign">NOTAM Assigned:</label>
	<input id="update_notam_assign" class="text" name="update_notam_assign" size="20" type="text" value="<?php echo $fss_notam_assign; ?>">
	<label for="update_initials">Initials:</label>
	<input id="update_initials" class="text" name="update_initials" size="20" type="text" value="<?php echo $fss_initials; ?>" style="color:#000">
	<br>
	<label for="update_cleared">FSS Notified Resolution:</label>
	<input id="update_cleared" class="text" name="update_cleared" size="20" type="text" value="<?php echo $fss_cleared; ?>">
	<label for="update_cancelled">Cancelled Date:</label>
	<input id="update_cancelled" class="text" name="update_cancelled" size="20" type="text" value="<?php echo $date; ?>" onFocus="clearDefault(this)" style="color:#000" maxlength="10">
	<label for="update_cancelled_initials">Initials:</label>
	<input id="update_cancelled_initials" class="text" name="update_cancelled_initials" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC">
	<button class="buttons">Add Entry</button>
	</fieldset>
	</form>
<?php
	}
	mysql_free_result($result);
	mysql_close();
?>

