<!--
 - PHP Document
 - Copyright 2011 
 - Stephen Bush 
 - trininox@gmail.com 
 - Version 0.4.22
 - Includes jQuery.js
-->
<?php


include_once ('../function_dbconnect.php');

if(isset($_GET['keyword'])){
    $keyword = 	trim($_GET['keyword']) ;
$keyword = mysqli_real_escape_string($dbc, $keyword);
$keyword2 = 	trim($_GET['date']) ;
$keyword2 = mysqli_real_escape_string($dbc, $keyword2);



$query = "select * from logs where report_date BETWEEN $keyword2 AND NOW() AND (eas_type like '%$keyword%' or initials like '%$keyword%' or station like '%$keyword%' or eas_lp1 like '%$keyword%' or self_type like '%$keyword%' or tower_fail like '%$keyword%' or eas_from like '%$keyword%' or eas_error like '%$keyword%' or tower_fss like '%$keyword%')";

//echo $query;
$result = mysqli_query($dbc,$query);
if($result){
    if(mysqli_affected_rows($dbc)!=0){
	echo "<table border='1'>";
	echo "<tr>
	<th>Index</th>
	<th>Date & Time</th>

	<th>Station</th>
	<th>Initialed</th>
	<th>LP1</th>
	<th>LP2</th>
	<th>I-NET</th>
	<th>EAS Rx Type</th>
	
	<th>EAS Rx From</th>
	<th>EAS Tx Type</th>
	<th>Aired</th>
	<th>Errored</th>

	<th>Tower Status</th>
	<th>Tower Failure Note</th>
	<th>FSS NOTAM Active</th>
	<th>FSS Contact</th>
	<th>FSS NOTAM</th>
	<th>FSS Logged By</th>
	<th>FSS Cancel Contact</th>
	<th>FSS Cancelled On</th>
	<th>Initialed By</th>
	<th>Chief Notes</th>
	<th>Chief Initials</th>
	<th>Reviewed Date</th>
	</tr>
	";
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
     echo "<tr bgcolor='white'>".
   '<th>'.$row["index"].
   '</th>'.'<th>'.$row["report_date"].

   '</th>'.'<th>'.$row["station"].
   '</th>'.'<th>'.$row["initials"].
   '</th>'.'<th>'.$row["eas_lp1"].
   '</th>'.'<th>'.$row["eas_lp2"].
   '</th>'.'<th>'.$row["eas_inet"].
   '</th>'.'<th>'.$row["eas_type"].


   '</th>'.'<th>'.$row["eas_from"].
   '</th>'.'<th>'.$row["self_type"].
   '</th>'.'<th>'.$row["eas_aired"].
   '</th>'.'<th>'.$row["eas_error"].

   '</th>'.'<th>'.$row["tower_status"].
   '</th>'.'<th>'.$row["tower_fail"].
   '</th>'.'<th>'.$row["tower_fss"].
   '</th>'.'<th>'.$row["fss_notified"].
   '</th>'.'<th>'.$row["fss_notam_assign"].
   '</th>'.'<th>'.$row["fss_initials"].
   '</th>'.'<th>'.$row["fss_cleared"].
   '</th>'.'<th>'.$row["fss_cancelled"].
   '</th>'.'<th>'.$row["fss_cancelled_initials"].
   '</th>'.'<th>'.$row["chief_review"].
   '</th>'.'<th>'.$row["chief_designated"].
   '</th>'.'<th>'.$row["chief_date"].'</th>';   
    }
    }else {
        echo 'No Results for :"'.$_GET['keyword'].'"';
    }
  
}
}else {
    echo 'Parameter Missing';
}




?>