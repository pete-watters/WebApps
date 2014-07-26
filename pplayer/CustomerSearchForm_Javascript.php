<script type="text/javascript">
$(function() {
// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
$("#dialog").dialog("destroy");		
		
// Need to create a VAR here for the field you want validated
var StartDate = $("#StartDate"),
EndDate = $("#EndDate"),
Customer = $("#Customer"),
Site = $("#Site"),
// Add all the vars you created to an array called allFields to apply validation to them all
allFields = $([]).add(StartDate).add(EndDate).add(Customer).add(Site),
			tips = $(".validateTips");		
        	
	function updateTips(t) {
			tips
				.text(t)
				.addClass('ui-state-error').effect("highlight",{},1500);
				// this controls removing the validation message. The class is removed quickly so it doesn't seem blocky
			setTimeout(function() {	tips.removeClass('ui-state-error', 100).text('');}, 1500);
		}

	function checkDate(o,n,min,max) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass('ui-state-error');
				updateTips(n);
				return false;
			} else {
				return true;
			}
		}
		
	function checkDateRange(StartDate,EndDate, n) {
			if ( StartDate.val() > EndDate.val()) {
				StartDate.addClass('ui-state-error');
				EndDate.addClass('ui-state-error');
				updateTips(n);
				return false;
			} else {
				return true;
			}
		}
		
	function checkSelect(o,n,min,max) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass('ui-state-error');
				updateTips(n);
				return false;
			} else {
				return true;
			}
		}		
		
		$("#Customer-Search-form").dialog({
			autoOpen: false,
			height: 500,
			width: 900,
			modal: false,
			buttons: {
				'Check Data Availability': function() {
					var bValid = true;
					allFields.removeClass('ui-state-error');

					bValid = bValid && checkSelect(Customer,"Customer is required",4,10);
					bValid = bValid && checkSelect(Site,"Site is required",4,10);
					
					bValid = bValid && checkDate(StartDate,"Start Date is required",10,10);
					bValid = bValid && checkDate(EndDate,"End Date is required",10,10);
					
					bValid = bValid && checkDateRange(StartDate, EndDate,"Start date must be before end date");
					allFields.removeClass('ui-state-error');
		
					if (bValid) {						
														$('#waiting').show(500);
														$('#message').hide(0);
														$('#console').hide(0);
														$('#confirmation_dialog').dialog("close");
									
														$.ajax({
														type : 'POST',
														url : 'CheckDataAvailability.php',
														dataType : 'json',
														data: {
														Customer : $('#Customer').val()
														},
														success : function(data){
																				$('#waiting').hide(500);
																				$('#console').show(0);
																				if (data.error === true)
																				$('#CustomerStatisticsSearchForm').show(500);
																				$("#console").append(data.msg);	
																				//Change dialog option buttons now its selected 
																				$( "#Customer-Search-form" ).dialog( "option", "buttons", [
																												{
																												text: "Plot Data",
																												click: function() {
																																$('#confirmation_dialog').dialog('open');
																																return false;
																												}
																												},
																												{
																												text: "Cancel",
																												click: function() { 
																												$(this).dialog('close');
																												}
																												}
																										] );
																		},
														error : function(XMLHttpRequest, textStatus, errorThrown) {
																				$('#waiting').hide(500);
																				$('#console').show(0);
																				$('#message').removeClass().addClass('error').text('There was an error.').show(500);
																				$("#console").append('There was an error.');
																				$('#CustomerStatisticsSearchForm').show(500);
																		}
														});
										
												return false; 
									
						$(this).dialog('close');
						}
				},
			'Cancel': function() {
					$(this).dialog('close');
				}
			},
			close: function() {
				allFields.val('').removeClass('ui-state-error');
			}
		});
				
				
					
		// Disable Enter command for form submit	 
		      $("#Customer-Search-form").keypress(function(e) {
		 	      if (e.which == 13) {
		 		      return false;} });
			
		// Customer Search Dialog Button
		$('#Customer-Search')
			.button()
			.click(function() {
				$('#Customer-Search-form').dialog('open');
			});
			
			
					$("SELECT")
					.selectBox()
					.change( function() {
					var selectAttribName=$(this).attr('name');
					var selectAttribValue=$(this).val();
					$("#console")[0].scrollTop = $("#console")[0].scrollHeight;
					});

					

					$("#Customer")
					.click( function() { $("#Site").selectBox('disable');})
					.change( function() {
									$("#console").empty();
									var CustomerValue=$(this).val();
									if (CustomerValue != ".")
									  {
											  $("#Site").selectBox('enable');
											  $("#console").append( 'Customer: ' + CustomerValue + '<br />');	
									   }
									else
									  { $("#Site").selectBox('disable');}
									});

					$("#Site")
					.click( function() {					})
					.change( function() {	var SiteValue=$(this).val();
											if (SiteValue != "."){
											$("#console").append("Site:" + SiteValue + '<br />' );										  
											// Enable Start Date picker now Site is chosen
											$("#StartDate").show(0);	
											$("#StartDate").datepicker('enable');	
										// show date div
									   }
									else
									  {  // hide date div
									  }});
					
$("#StartDate")
			.datepicker(
						{ 
						// main options						
						showOn: 'button',
						// On click doesn't work for this so you need to use onSelect
						// When the user clicks a date it's appended to the console
						onSelect: function(date) {
									$("#console").append('Start Date: ' + date + '<br />');	
									$("#EndDate").show(0);	
									$("#EndDate").datepicker('enable');	
										}
						}
						)
			.next('button')
			.text('Start Date')
			.button(
					{icons:{primary : 'ui-icon-calendar'}}
					);
			
$("#EndDate")
			.datepicker(
						{ 
						// main options						
						showOn: 'button',
						// On click doesn't work for this so you need to use onSelect
						// When the user clicks a date it's appended to the console
						onSelect: function(date) {
									$("#console").append('End Date: ' + date + '<br />');		
										}
						}
						)
			.next('button')
			.text('End Date  ')
			.button(
					{icons:{primary : 'ui-icon-calendar'}}
					);
		
					
// Disable Date pickers until Customer and Site are chosen
$("#StartDate").datepicker('disable');	
$("#EndDate").datepicker('disable');	

$('#confirmation_dialog').dialog({
								autoOpen: false,
								modal: true,
								width: 600,
								buttons: {
								"Plot Data": function() {
						// create var to store URL rewrite and redirect to servlet for validation  
						//var redirect = "/TNFMON/servlet/statistics.StatisticsValidateCustomerID?customerID="+ Customer.val() + "&Site="+ Site.val() + "&StartDate="+ StartDate.val()+ "&EndDate="+ EndDate.val() + "&valid=1";
						var redirect = "index.php?customerID="+ Customer.val() + "&Site="+ Site.val() + "&StartDate="+ StartDate.val()+ "&EndDate="+ EndDate.val() + "&valid=1";
						$(location).attr('href',redirect);
													},
								"Cancel": function() {
													$(this).dialog("close");
													}
											}
					});
	});
	</script>