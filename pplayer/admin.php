<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" />

<!--JS Includes -->
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.selectBox.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
	<!-- CSS includes-->			
	<link type="text/css" rel="stylesheet" href="css/themes/redmond/jquery-ui-1.8.18.custom.css"> </link>
	<link type="text/css" rel="stylesheet" href="css/jquery.selectBox.css"></link>
       
	  <script type="text/javascript">
			$(function(){
				// Tabs
				$('#tabs').tabs();
				
				// Accordion
				$("#accordion").accordion({ header: "h3" });
				});
		</script> 
	   
	   <style type="text/css" title="currentStyle">
		    @import "css/DataTables.css";
			@import "css/themes/redmond/jquery-ui-1.8.18.custom.css";
		</style>
		
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				oTable = $('#example').dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
				});
			} );
		</script>
<? include 'Form_Javascript.php' ?>
 
</head>
<body>


<div id="page">
					
	<div id="bg">
		<div id="content">
		<br />
		
		
		<table>
		<tr>
		<td>
	<div id="accordion" style="width:90%;height:100%;padding-left:10%;">
			<div>
				<h3><a href="#">First</a></h3>
				<div>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</div>
			</div>
			<div>
				<h3><a href="#">Second</a></h3>
				<div>Phasellus mattis tincidunt nibh.</div>
			</div>
			<div>
				<h3><a href="#">Third</a></h3>
				<div>Nam dui erat, auctor a, dignissim quis.</div>
			</div>
		</div>
		</td>
		<td>
<div id="tabs" style="width:100%;height:90%;">
			<ul>
				<li><a href="#Browse-tab">Browse videos</a></li>
				<li><a href="#Search-tab">Search</a></li>
				<li><a href="#Upload-tab">jPlayer</a></li>
				<li><a href="#Playlist-tab">Playlists</a></li>

            </ul>
			<div id="Browse-tab">
		    <div id="data_table_container">
			
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="550" height="400">
	<thead>
		<tr>
			<th>Category</th>
			<th>Sub-Category</th>
			<th>Date Added</th>
			<th>Length</th>
			<th>Format</th>
		</tr>
	</thead>
	<tbody>

		<tr class="gradeX">
			<td>Auto</td>
			<td>Nissan </td>
			<td>2012-02-01</td>
			<td class="center">0:35</td>
			<td class="center">mp4</td>

		</tr>
		<tr class="gradeC">
			<td>Food</td>
			<td>McDonalds</td>
			<td>2012-03-01</td>
			<td class="center">00:00:22</td>
			<td class="center">ogg</td>

		</tr>
		<tr class="gradeA">
			<td>Clothing</td>
			<td>Nike</td>
			<td>2009-09-09</td>
			<td class="center">00:00:46</td>
			<td class="center">ogg</td>

		</tr>
		<tr class="gradeU">
			<td>Other</td>
			<td>All others</td>
			<td>-</td>
			<td class="center">-</td>
			<td class="center">U</td>

		</tr>
	</tbody>
</table>	
			
		</div>
			</div>
			
			
			<div id="Search-tab" >
            	
				<table  style="height:500px;width:400px;">
				<tr>
				<td>
			
<div id="validateDIV" class="ui-widget" style="width:50%; font-family: Arial, Helvetica, sans-serif; padding:10px; float:right;"> <p class="validateTips"> </p> </div>
    
	<div id="console" style="width:50%; font-family: Arial, Helvetica, sans-serif; background:#FFF; float:right;"></div>
    
	<form id="AdminForm">
<fieldset>
     		  <div id="waiting" style="width:50%;display:none;float:right;padding-left:500px;">  Please wait.....<br /> <img src="images/ajax-loader.gif" title="Loader" alt="Loader" />   </div>
			 <p>
					<select name="Category" id="Category" autofocus="autofocus" class="select ui-widget-content ui-corner-all">
                          <option value="." selected="selected">Choose a Category</option>
                          <option value="Food">Food</option>
						  <option value="Auto">Auto</option>
					</select>
					<br />
				    <select name="SubCategory" id="SubCategory" disabled="0" class="select ui-widget-content ui-corner-all">
                        <option value="." selected="selected">Choose a Sub Category</option>
						<div id="showCategory"></div>                       
                    </select>
					<br /><br />
					<input type="test" name="InputText" id="InputText" value="" class="text ui-widget-content ui-corner-all"> 
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
           </td>
		   </tr>
		   </table>
		

    	
		
	</div>
	<!-- -->
		<div id="Upload-tab">
		

<? include 'jplayer.php' ?>		
			</div>
				
		<div id="Playlist-tab">
		<div class="post" style="padding-top: 57px;">								
						<video width="550" height="425" controls autoplay>
							<source src="media/test.mp4" type="video/mp4"  /><!-- Safari / iOS, IE9 -->
							<source src="media/test.m4v" type="video/webm" /><!-- Chrome10+, Ffx4+, Opera10.6+ -->
							<source src="media/test.ogg" type="video/ogg"  /><!-- Firefox3.6+ / Opera 10.5+ -->
							<!-- fallback to Flash: -->
							<object width="640" height="360" type="application/x-shockwave-flash" data="player.swf">
								<!-- Firefox uses the `data` attribute above, IE/Safari uses the param below -->
								<param name="movie" value="player.swf" />
								<param name="flashvars" value="autostart=true&amp;controlbar=over&amp;file=http://localhost/YouTune/snowglas/media/test.mp4" />
								<!-- fallback image -->
								<img src="poster.jpg" width="640" height="360" alt="Big Buck Bunny" title="No video playback capabilities, please download the video below" />
							</object>
						</video>
			</div>
		</div>
				
	 </div>
</div>
		</td>
		</tr>
	</table>
			
			
		</div>
		<!-- end contentn -->
		
		<!-- end sidebar -->
	</div>
</div>
<!-- end page -->
<hr />
<div id="footer">
	<p>(c) 2012 www.peterjwatters.com. All rights reserved.</p>
</div>
</body>
</html>
