<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/review.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
require_once ('function_connect.php');
error_reporting (E_ALL ^ E_NOTICE); 
$last_date = date('Y-m-d', strtotime('last Monday'));
$date = date('Y-m-d');
$todate = date('Y-m-d');
$time = date('H:i:s');
$datedtime = date("l \\t\h\e jS \of F Y \@ H:i:s");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Review <?php echo $datedtime; ?> EST</title>
</head>
<div id="searchform" name="searchform">
<body>
<form>
<fieldset>
<p class="header" style="margin:0px"><?php 	
echo "<b>Last Monday was:  </b>";
echo date('Y-m-d', strtotime('last Monday')); 
echo "<br><b>      Two Mondays ago was:  </b>";
echo date('Y-m-d', strtotime('last Monday -7 DAY'));?>
<br><b>Reviewing From: </b><span id="from" name="from"> </span>
</p>
</fieldset>
</form>
<div class="container" id="original" name="original">
<form action="" method="get" id="chiefreportform">
<fieldset>
<label for="mystation">Station:</label>
<select id="mystation" name="mystation">
<option value="WAOE">WAOE</option>
<option value="WEEK">WEEK</option>
<option value="WHOI">WHOI</option>
<option value="WISE">WISE</option>
<option value="WMYD">WMYD</option>
<option value="WPTA">WPTA</option>
</select>
<label>From Date: </label>
<input  name="fromdate" type="text" id="fromdate" onFocus="clearDefault(this)" value="<?php echo $last_date; ?>"/>
<button class="buttons" id="submit" type="submit" name="submit">Review</button> 
</fieldset>
</form>
</div>
<br>
<div id="resultdata" class="table"> </div>
</div>
<div id="chiefreview" name="chiefreview" class="container">
    <form id="chiefreviewform" method="post" class="bottom">
	<fieldset>
	<legend>Append Review</legend>   
    <input type="text" name="last_date" value="<?php echo $last_date; ?>" id="last_date" style="display:none;">
    <input type="text" name="todate" value="<?php echo ' to ' . $todate; ?>" id="todate" style="display:none;">
	<label for="review_notes">Review Notes:  <span id="from" name="from"> </span><span id="to" name="to"> </span> </label>
    <br>
	<textarea id="review_notes" class="review_notes" name="review_notes" type"textarea" onFocus="clearDefault(this)" style="color:#CCC">Items have been reviewed</textarea>
    <br>
	<label for="chief_initials">Initials:</label>
	<input id="chief_initials" class="text" name="chief_initials" size="20" type="text" value="Initials" onFocus="clearDefault(this)" style="color:#CCC" maxlength="3">
    <button class="entry">Add Entry</button>
    </fieldset>
    </form>
</div>
<div>
</div>
</div>
</body>
</html>
