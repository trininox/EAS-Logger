/*!
 * JavaScript Document
 * Copyright 2011 
 * Stephen Bush 
 * trininox@gmail.com 
 * Version 0.4.21
 * Includes jQuery.js
 */
function clearDefault(el) {
  	if (el.defaultValue==el.value) el.value = ""
	if (el.style) el.style.cssText = ""
}
$(document).ready(function() {

$("#faq_search_input").watermark("Begin Typing to Search");

$("#faq_search_input").keyup(function()
{
var faq_search_input = $(this).val();
var date = $("#date").val();
var dataString = 'keyword='+ faq_search_input +'& date='+ date;
if(faq_search_input.length>1)

{
$.ajax({
type: "GET",
url: "admin/search.php",
data: dataString,
beforeSend:  function() {

$('input#faq_search_input').addClass('loading');

},
success: function(server_response)
{

$('#searchresultdata').html(server_response).show();
$('span#faq_category_title').html(faq_search_input);

if ($('input#faq_search_input').hasClass("loading")) {
 $("input#faq_search_input").removeClass("loading");
        } 

}
});
}return false;
});
});
	  