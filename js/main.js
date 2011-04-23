/*!
 * JavaScript Document
 * Copyright 2011 
 * Stephen Bush 
 * trininox@gmail.com 
 * Version 0.4.22
 */
	function clearDefault(el) {
  		if (el.defaultValue==el.value) el.value = ""
		if (el.style) el.style.cssText = ""
		}
	
	$(document).ready(function()
		{
			$("#instruction").change(function(){
				$("#wpta").hide();
				$("#week").hide();
				$("#whoi").hide();
				$("#wmyd").hide();
    		switch($(this).val()){
       			case "WPTA":
            $("#wpta").slideDown("fast");
            
        		break;
        		case "WEEK":
            $("#week").slideDown("fast"); 
            
        		break;
        		case "WHOI":
            $("#whoi").slideDown("fast");
            
        		break;
				case "WMYD":
            $("#wmyd").slideDown("fast");
            
        		break;
        		case "NONE":
            
        		break;
    		}
			});
			//$('div#lpcheck').load('lpcheck.php').toggle("blind");
			//$('div#eastest').load('eastest.php').toggle("blind");
			//$('div#selftest').load('selftest.php').toggle("blind");
			//$('div#towerlights').load('towerlights.php').toggle("blind");
			//$('div#failure').load('failure.php').toggle("blind");
			$('div#chiefsreview').load('operators/report.php').toggle("blind");
			$('#openall').click(function()
				{
					$('div#lpcheck').fadeIn('blind');
					$('div#eastest').fadeIn('blind');
					$('div#selftest').fadeIn('blind');
					$('div#towerlights').fadeIn('blind');
					$('div#failure').fadeIn('blind');
				});
			$('div#lpcheck').hide();
			$('#lpchecker').click(function()
				{
					$('div#lpcheck').toggle('blind');
				});
			$('div#eastest').hide();
			$('#eastester').click(function()
				{
					$('div#eastest').toggle('blind');
				});
			$('div#selftest').hide();
			$('#selftester').click(function()
				{
					$('div#selftest').toggle('blind');
				});
			$('div#towerlights').hide();
			$('#towerlightser').click(function()
				{
					$('div#towerlights').toggle('blind');
				});
			$('div#failure').hide();
			$('#failureer').click(function()
				{
					$('div#failure').toggle('blind');
				});
			$('div#chiefsreview').hide();
			$('#chiefsreviewer').click(function()
				{
					$('div#chiefsreview').toggle('blind');
				});
			//$('div#refeedsub').hide();
			
			$('button').button();
			
			$("form#lpcheckform").submit(function() {				
				// we want to store the values from the form input box, then send via ajax below  
					var station_lpcheck     = $('#station_lpcheck').attr('value'); 
					var report_date     = $('#report_date').attr('value');  
					var eas_lp1     = $('#eas_lp1').attr('value'); 
					var eas_lp2     = $('#eas_lp2').attr('value');
					var eas_inet     = $('#eas_inet').attr('value');
					var check_error     = $('#check_error').attr('value');  
				
				if (eas_lp1==null || eas_lp1=="" || eas_lp1=="Initials"){
  					alert("EAS LP1 must be initialed");
					event.preventDefault();
 					return false;}
				if (eas_lp2==null || eas_lp2=="" || eas_lp2=="Initials"){
  					alert("EAS LP2 must be initialed");
					event.preventDefault();
 					return false;}
				if (eas_inet=="Initials"){
  					eas_inet = "";
 					;}

					
						$.ajax({  
							type: "POST",  
							url: "operators/lpcheck.php",  
							data: "station_lpcheck="+ station_lpcheck +"& report_date="+ report_date +"& eas_lp1="+ eas_lp1 +"& eas_lp2="+ eas_lp2 +"& eas_inet="+ eas_inet +"& check_error="+ check_error,  
							success: function(){
    							$('div#lpsuccess').fadeIn();
								$('div#chiefsreview').load('operators/report.php');
  							},
  							error: function(){
   								alert('failure');
            				}  
        				});  
    				  return false;
					
    			});  
			$("form#eastestform").submit(function() {  
				// we want to store the values from the form input box, then send via ajax below  
					var eas_type     = $('#eas_type').attr('value');  
					var eas_station     = $('#eas_station').attr('value'); 
					var eas_time     = $('#eas_time').attr('value');
					var eas_from     = $('#eas_from').attr('value');
					var eas_initials     = $('#eas_initials').attr('value');
					var eas_error     = $('#eas_error').attr('value');
					var eas_aired     = $('#eas_aired').attr('value');
					 
				if (eas_from==null || eas_from==""){
  					alert("The 'From:' field must be entered");
					event.preventDefault();
 					return false;}
				if (eas_initials==null || eas_initials=="" || eas_initials=="Initials"){
  					alert("Initials must be entered");
					event.preventDefault();
 					return false;}
				if (eas_time==null || eas_time==""){
  					alert("Aired Time must be entered");
					event.preventDefault();
 					return false;}
						 
						$.ajax({  
							type: "POST",  
							url: "operators/eastest.php",  
							data: "eas_type="+ eas_type +"& eas_station="+ eas_station +"& eas_time="+ eas_time +"& eas_from="+ eas_from +"& initials="+ eas_initials +"& eas_error="+ eas_error +"& eas_aired="+ eas_aired,  
							success: function(){
								
    							$('div#eassuccess').fadeIn();
								$('div#chiefsreview').load('operators/report.php');
  							},
  							error: function(){
   								alert('failure');
            				}  
        				});  
    				return false;  
    			});  
			$("form#selftestform").submit(function() {  
				// we want to store the values from the form input box, then send via ajax below  
					var self_type     = $('#self_type').attr('value');  
					var self_station     = $('#self_station').attr('value'); 
					var self_time     = $('#self_time').attr('value');
					var self_initials     = $('#self_initials').attr('value');
					var self_error     = $('#self_error').attr('value');
					var self_aired     = $('#self_aired').attr('value');
					
				if (self_initials==null || self_initials=="" || self_initials=="Initials"){
  					alert("Initials must be entered");
					event.preventDefault();
 					return false;}
				if (self_time==null || self_time==""){
  					alert("Aired Time must be entered");
					event.preventDefault();
 					return false;}
					 
						$.ajax({  
							type: "POST",  
							url: "operators/selftest.php",  
							data: "self_type="+ self_type +"& self_station="+ self_station +"& self_time="+ self_time +"& initials="+ self_initials +"& self_error="+ self_error +"& self_aired="+ self_aired,  
							success: function(){
								
    							$('div#selfsuccess').fadeIn();
								$('div#chiefsreview').load('operators/report.php');
  							},
  							error: function(){
   								alert('failure');
            				}  
        				});  
    				return false;  
    			});  
			$("form#towerlightsform").submit(function() {  
				// we want to store the values from the form input box, then send via ajax below
					var tower_station     = $('#tower_station').attr('value');  
					var tower_date     = $('#tower_date').attr('value');  
					var tower_time     = $('#tower_time').attr('value'); 
					var tower_status     = $('#tower_status').attr('value');
					var tower_initials     = $('#tower_initials').attr('value');
					
				if (tower_initials==null || tower_initials=="" || tower_initials=="Initials"){
  					alert("Initials must be entered");
					event.preventDefault();
 					return false;}
				if (tower_status==null || tower_status==""){
  					alert("Tower status must be entered");
					event.preventDefault();
 					return false;}
				if (tower_time==null || tower_time==""){
  					alert("Time must be entered");
					event.preventDefault();
 					return false;}
				if (tower_date==null || tower_date==""){
  					alert("Date must be entered");
					event.preventDefault();
 					return false;}	
					 
						$.ajax({  
							type: "POST",  
							url: "operators/towerlights.php",  
							data: "tower_station="+ tower_station +"& tower_date="+ tower_date +"& tower_time="+ tower_time +"& tower_status="+ tower_status +"& initials="+ tower_initials,  
							success: function(){
								
    							$('div#towersuccess').fadeIn();
								$('div#chiefsreview').load('operators/report.php');
  							},
  							error: function(){
   								alert('failure');
            				}  
        				});  
    				return false;  
    			});  
			$("form#failureform").submit(function() {  
				// we want to store the values from the form input box, then send via ajax below
					var index		= $('#index').attr('value');	
					var fail_station     = $('#fail_station').attr('value');  
					var tower_fail     = $('#tower_fail').attr('value');
					var fail_initials     = $('#fail_initials').attr('value');  
					var tower_fss     = $('#tower_fss').attr('value'); 
					var fss_notified     = $('#fss_notified').attr('value');
					var fss_notam_assign     = $('#fss_notam_assign').attr('value');
					var fss_initials     = $('#fss_initials').attr('value');
					var fss_cleared     = $('#fss_cleared').attr('value');
					var fss_cancelled     = $('#fss_cancelled').attr('value');
					var fss_cancelled_initials     = $('#fss_cancelled_initials').attr('value');
					
		 
				if (tower_fail==null || tower_fail=="" || tower_fail=="Beacon  Out"){
  					alert("Failure note must be completed");
					event.preventDefault();
 					return false;}
				if (fail_initials==null || fail_initials=="" || fail_initials=="Initials"){
  					alert("Initials must be entered");
					event.preventDefault();
 					return false;}
				
				if (tower_fss=="on" && (fss_notified==null || fss_notified=="")){
  					alert("FSS notified must be completed");
					event.preventDefault();
 					return false;}
				if (tower_fss=="on" && (fss_notam_assign==null || fss_notam_assign=="")){
  					alert("NOTAM assigned must be completed");
					event.preventDefault();
 					return false;}
				if (tower_fss=="on" && (fss_initials=="Initials" || fss_initials=="")){
  					alert("Initials must be completed");
					event.preventDefault();
 					return false;}
					 					 
						$.ajax({  
							type: "POST",  
							url: "operators/failure.php",  
							data: "index="+ index
							+"& fail_initials="+ fail_initials 
							+"& fail_station="+ fail_station 
							+"& tower_fail="+ tower_fail 
							+"& tower_fss="+ tower_fss 
							+"& fss_notified="+ fss_notified 
							+"& fss_notam_assign="+ fss_notam_assign
							+"& fss_initials="+ fss_initials 
							+"& fss_cleared="+ fss_cleared 
							+"& fss_cancelled="+ fss_cancelled 
							+"& fss_cancelled_initials="+ fss_cancelled_initials, 
							
							  
							success: function(){
								location.reload();
  							},
  							error: function(){
   								alert('failure');
            				}  
        				});  
    				return false;  
    			});  
		$("form#updateform").submit(function() {  
				// we want to store the values from the form input box, then send via ajax below
					var index		= $('#index').attr('value');	
					var update_station     = $('#update_station').attr('value');  
					var update_fail     = $('#update_fail').attr('value');
					var update_initials    = $('#update_initials').attr('value');  
					var update_fss    = $('#update_fss').attr('value'); 
					var update_notified     = $('#update_notified').attr('value');
					var update_notam_assign    = $('#update_notam_assign').attr('value');
					var update_initials     = $('#update_initials').attr('value');
					var update_cleared     = $('#update_cleared').attr('value');
					var update_cancelled     = $('#update_cancelled').attr('value');
					var update_cancelled_initials     = $('#update_cancelled_initials').attr('value');
					 	
				if (update_cleared==null || update_cleared=="" || update_cleared=="Initials"){
  					alert("Resolution contact must be entered");
					event.preventDefault();
 					return false;}
				if (update_cancelled==null || update_cancelled=="" || update_cancelled=="Initials"){
  					alert("Cancel date must be entered (YYYY-MM-DD)");
					event.preventDefault();
 					return false;}
				if (update_cancelled_initials==null || update_cancelled_initials=="" || update_cancelled_initials=="Initials"){
  					alert("Initials must be entered");
					event.preventDefault();
 					return false;}
									 
						$.ajax({  
							type: "POST",  
							url: "operators/updatefail.php",  
							data: "index="+ index
							+"& update_initials="+ update_initials 
							+"& update_station="+ update_station 
							+"& update_fail="+ update_fail 
							+"& update_fss="+ update_fss 
							+"& update_notified="+ update_notified 
							+"& update_notam_assign="+ update_notam_assign
							+"& update_initials="+ update_initials 
							+"& update_cleared="+ update_cleared 
							+"& update_cancelled="+ update_cancelled 
							+"& update_cancelled_initials="+ update_cancelled_initials, 
							
							  
							success: function(){				
								location.reload();
  							},
  							error: function(){
   								alert('failure');
            				}  
        				});  
    				return false;  
    			});
		var auto_refresh = setInterval(function()
					{
						$('span#clock').load('function_clock.php').show();												
					}, 1000);		
				  

		});
