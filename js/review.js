/*!
 * JavaScript Document
 * Copyright 2011 
 * Stephen Bush 
 * trininox@gmail.com 
 * Version 0.4.26
 * Includes jQuery.js
 */
function clearDefault(el) {
  	if (el.defaultValue==el.value) el.value = ""
	if (el.style) el.style.cssText = ""
}
$(document).ready(function() {
	$('#chiefreview').hide();
	$("form#chiefreportform").submit(function() {				
		// we want to store the values from the form input box, then send via ajax below  
			var fromdate     = $('#fromdate').attr('value');
			var mystation		= $('#mystation').attr('value');
			var todate		= $('#todate').attr('value'); 
		
		if (fromdate==null || fromdate==""){
			alert("Date must be entered!");
			event.preventDefault();
			return false;}
			
				$.ajax({  
					type: "GET",  
					url: "admin/chiefreport.php",  
					data: "fromdate="+ fromdate +"& mystation="+ mystation +"& todate="+ todate,
					  
					success: function(server_response){
						$('#resultdata').html(server_response).show();
						$('span#from').html(fromdate);
						$('span#to').html(todate);						
						$('#chiefreview').show('fast');
						},
					error: function(){
						alert('failure');
						}  
				});  
			  return false;
			
		}); 
	$("form#chiefreviewform").submit(function() {				
		// we want to store the values from the form input box, then send via ajax below  
			var fromdate     = $('form#chiefreportform').find('input[name=fromdate]').val();
			var mystation		= $('form#chiefreportform').find('select[name=mystation]').val();
			var todate     = $('form#chiefreportform').find('input[name=todate]').val();
			var review_notes		= $('#review_notes').attr('value');
			var chief_initials		= $('#chief_initials').attr('value'); 
		
		if (fromdate==null || fromdate==""){
			alert("Date must be entered!");
			event.preventDefault();
			return false;}
		if (review_notes==null || review_notes=="" || review_notes=="Items have been reviewed"){
			alert("Notes must be entered!");
			event.preventDefault();
			return false;}
		if (chief_initials==null || chief_initials=="" || chief_initials=="Initials"){
			alert("Initials must be entered!");
			event.preventDefault();
			return false;}
			
				$.ajax({  
					type: "GET",  
					url: "admin/updatereport.php",  
					data: "fromdate="+ fromdate +"& mystation="+ mystation +"& review_notes="+ review_notes +"& chief_initials="+ chief_initials +"& todate="+ todate,
					  
					success: function(server_response){
						$('#resultdata').html(server_response).show();
						$('#submit').trigger('click');
						$('span#from').html(fromdate);
						$('span#to').html(todate);
						$('#chiefreview').hide();						
					},
					error: function(){
						alert('failure');
						}  
				});  
			  return false;
			
		});   
});
	  