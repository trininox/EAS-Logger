<?php 
error_reporting (E_ALL ^ E_NOTICE); 
$date = date('Y-m-d', strtotime('-14 DAYS'));
?>
<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.watermark.js"></script>
<script type="text/javascript" src="js/search.js"></script>
<link href="css/searchstyle.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Search</title>
</head>
<body>
<div id="keywordsearch" name="keywordsearch">
<div class="faqsearchinputbox">
<form>
<fieldset>
<Legend>Search Form</Legend>
<label>Date: </label>
<input  name="date" type="text" id="date" onFocus="clearDefault(this)" value="<?php echo $date; ?>"/>
<label>Keyword: </label>
<input  name="query" type="text" class="wide" id="faq_search_input" /> 
</fieldset>
</form>
</div>
<br>
<strong>Search Results For : </strong> <span id="faq_category_title">Keyword </span>
<br>
</div>
</div>
<div id="searchresultdata" class="table"> </div>
</div>
</body>
</html>