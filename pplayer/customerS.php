<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<!--JS Includes -->
	<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.selectBox.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.14.custom.min.js"></script>
	<!-- CSS includes-->			
	<link type="text/css" rel="stylesheet" href="css/ui-lightness/jquery-ui-1.8.14.custom.css"> </link>
	<link type="text/css" rel="stylesheet" href="css/jquery.selectBox.css"></link>
       
<? include 'CustomerSearchForm_Javascript.php' ?>
 

 <script type="text/javascript">
                 $(function(){
                    var data = [
                                [
                                    {optionValue: 0,optionDisplay: 'CTW'},
                                    {optionValue: 1,optionDisplay: 'CDC'},
                                    {optionValue: 2,optionDisplay: 'Other'}
                                    ],
                                [
                                    {optionValue: 10,optionDisplay: 'Amsterdam'},
                                    {optionValue: 11,optionDisplay: 'Eindhoven'},
                                    {optionValue: 12, optionDisplay: 'JC'}
                               ],
                                [
                                    {optionValue: 20,optionDisplay: 'Aidan'},
                                    {optionValue: 21,optionDisplay: 'Russell'}
                                   ]
                               ];


                    $("#CustomerSelect").change(function() {
                        var $persons = $("#SiteSelect").empty();
                        $.each(data[$(this).val() - 1], function() {
                            $persons.append("<option value=" + this.optionValue + ">" + this.optionDisplay + "</option>");
                        });
                    });
                })    
                </script>





 </head>

<body style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">

<button id="Customer-Search"><span class="ui-icon ui-icon-search"></span>Search For Customer</button>
	
<div id="Customer-Search-form" title="Search For Customer">
    	
<div id="validateDIV" class="ui-widget" style="width:50%; font-family: Arial, Helvetica, sans-serif; padding:10px; float:right;"> <p class="validateTips"> </p> </div>
    
	<div id="console" style="width:50%; font-family: Arial, Helvetica, sans-serif; background:#FFF; float:right;"></div>
    
	<form id="CustomerStatisticsSearchForm">
		<fieldset>
     		  <div id="waiting" style="width:50%;display:none;float:right;padding-left:500px;">  Please wait.....<br /> <img src="images/ajax-loader.gif" title="Loader" alt="Loader" />   </div>
			 <p>
					<select name="Customer" id="Customer" autofocus="autofocus" class="select ui-widget-content ui-corner-all">
                          <option value="." selected="selected">Choose a Customer</option>
                          <option value="VFIE">VFIE</option>
					</select>
					<br />
				    <select name="Site" id="Site" disabled="0" class="select ui-widget-content ui-corner-all">
                        <option value="." selected="selected">Choose a Site</option>
						<div id="showCategory"></div>
						<option value="DublinCTW">Dublin CTW</option>                        
                    </select>
					<br /><br />
					<input type="hidden" name="StartDate" id="StartDate" value="." class="text ui-widget-content ui-corner-all"> 
					<br /><br />					
					<input type="hidden" id="EndDate" name="EndDate" value="." class="text ui-widget-content ui-corner-all"> 
				</p>
                <p>
	                  <div id="confirmation_dialog" title="Confirm">
                         <p>
                         Statistics will now be retrieved for the chosen customer for the date range specified. Please click to confirm your action.
                          <br /> If you do not wish to continue please click 'Cancel'.
                          </p>
                      </div>
                </p>
                  <div style="clear: both;"></div>
            </fieldset>
        </form>
	</div>
</body>
</html>
