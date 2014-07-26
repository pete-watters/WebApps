<?php ?>

<!DOCTYPE html>
<html>
	
    
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>youTune Test</title>
		<link type="text/css" href="css/custom-theme/jquery-ui-1.8.4.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
        
 
        
		<script type="text/javascript">
			$(function(){
	
				// Tabs
				$('#tabs').tabs();
	

				// Dialog			
				$('#dialog').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				
				// Dialog Link
				$('#dialog_link').click(function(){
					$('#dialog').dialog('open');
					return false;
				});

				
			});
		</script>
		<style type="text/css">
			/*demo page css*/
			body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
		</style>	
        
        <!--Google Video Search Code -->
            <script src="http://www.google.com/jsapi?key=AIzaSyA5m1Nc8ws2BbmPRwKu5gFradvD_hgq6G0" type="text/javascript"></script>
    <script type="text/javascript">
    // How to set the result order of a video search.
    
    google.load('search', '1');
    
    function OnLoad() {
    
      // Create a search control
      var searchControl = new google.search.SearchControl();
    
      // So the results are expanded by default
      options = new google.search.SearcherOptions();
      options.setExpandMode(google.search.SearchControl.EXPAND_MODE_OPEN);
    
      // Create a video searcher
      var videoSearch = new google.search.VideoSearch();
    
      // Set the result order of the search - check docs for other orders
      videoSearch.setResultOrder(google.search.Search.ORDER_BY_DATE);
    
      // Add our searcher to the control
      searchControl.addSearcher(videoSearch, options);
    
      // Draw the control onto the page
      searchControl.draw(document.getElementById("content"));
    
      // Because laughing is healthy.
      searchControl.execute("funny");
    }
    
    google.setOnLoadCallback(OnLoad);
    </script>


<!--Google Polling the Player code -->        
        <style type="text/css">
      #videoDiv {
        margin-right: 3px;
      }
      #videoInfo {
        margin-left: 3px;
      }
    </style>
    <script src="http://www.google.com/jsapi" type="text/javascript"></script>
    <script type="text/javascript">
      google.load("swfobject", "2.1");
    </script>    
    <script type="text/javascript">
      /*
       * Polling the player for information
       */
      
      // Update a particular HTML element with a new value
      function updateHTML(elmId, value) {
        document.getElementById(elmId).innerHTML = value;
      }
      
      // This function is called when an error is thrown by the player
      function onPlayerError(errorCode) {
        alert("An error occured of type:" + errorCode);
      }
      
      // This function is called when the player changes state
      function onPlayerStateChange(newState) {
        updateHTML("playerState", newState);
      }
      
      // Display information about the current state of the player
      function updatePlayerInfo() {
        // Also check that at least one function exists since when IE unloads the
        // page, it will destroy the SWF before clearing the interval.
        if(ytplayer && ytplayer.getDuration) {
          updateHTML("videoDuration", ytplayer.getDuration());
          updateHTML("videoCurrentTime", ytplayer.getCurrentTime());
          updateHTML("bytesTotal", ytplayer.getVideoBytesTotal());
          updateHTML("startBytes", ytplayer.getVideoStartBytes());
          updateHTML("bytesLoaded", ytplayer.getVideoBytesLoaded());
        }
      }
      
      // This function is automatically called by the player once it loads
      function onYouTubePlayerReady(playerId) {
        ytplayer = document.getElementById("ytPlayer");
        // This causes the updatePlayerInfo function to be called every 250ms to
        // get fresh data from the player
        setInterval(updatePlayerInfo, 250);
        updatePlayerInfo();
        ytplayer.addEventListener("onStateChange", "onPlayerStateChange");
        ytplayer.addEventListener("onError", "onPlayerError");
      }
      
      // The "main method" of this sample. Called when someone clicks "Run".
      function loadPlayer() {
        // The video to load
        var videoID = "ylLzyHk54Z0"
        // Lets Flash from another domain call JavaScript
        var params = { allowScriptAccess: "always" };
        // The element id of the Flash embed
        var atts = { id: "ytPlayer" };
        // All of the magic handled by SWFObject (http://code.google.com/p/swfobject/)
        swfobject.embedSWF("http://www.youtube.com/v/" + videoID +
                           "&enablejsapi=1&playerapiid=player1",
                           "videoDiv", "480", "295", "8", null, null, params, atts);
      }
      function _run() {
        loadPlayer();
      }
      google.setOnLoadCallback(_run);
    </script>
    
    
    
    <!-- Changing the playing video--> 
 <style type="text/css">
      #videoDiv_Change {
        margin-right: 3px;
      }
      #videoInfo_Change {
        margin-left: 3px;
      }
    </style>
    <script type="text/javascript">
      google.load("swfobject", "2.1");
    </script>    
    <script type="text/javascript">
      /*
       * Change out the video that is playing
       */
      
      // Update a particular HTML element with a new value
      function updateHTML(elmId, value) {
        document.getElementById(elmId).innerHTML = value;
      }
      
      // Loads the selected video into the player.
      function loadVideo() {
        var selectBox = document.getElementById("videoSelection");
        var videoID = selectBox.options[selectBox.selectedIndex].value
        
        if(ytplayer) {
          ytplayer.loadVideoById(videoID);
        }
      }
      
      // This function is called when an error is thrown by the player
      function onPlayerError(errorCode) {
        alert("An error occured of type:" + errorCode);
      }
      
      // This function is automatically called by the player once it loads
      function onYouTubePlayerReady(playerId) {
        ytplayer = document.getElementById("ytPlayer");
        ytplayer.addEventListener("onError", "onPlayerError");
      }
      
      // The "main method" of this sample. Called when someone clicks "Run".
      function loadPlayer() {
        // The video to load
        var videoID = "ylLzyHk54Z0"
        // Lets Flash from another domain call JavaScript
        var params = { allowScriptAccess: "always" };
        // The element id of the Flash embed
        var atts = { id: "ytPlayer" };
        // All of the magic handled by SWFObject (http://code.google.com/p/swfobject/)
        swfobject.embedSWF("http://www.youtube.com/v/" + videoID +
                           "&enablejsapi=1&playerapiid=player1",
                           "videoDiv", "480", "295", "8", null, null, params, atts);
      }
      function _run() {
        loadPlayer();
      }
      google.setOnLoadCallback(_run);
    </script>
	</head>
	<body>
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Search</a></li>
				<li><a href="#tabs-2">Polling</a></li>
				<li><a href="#tabs-3">Change</a></li>
            </ul>
			<div id="tabs-1">
            	<h1>Welcome to YouTune</h1>
                <p style="font-size: 1.3em; line-height: 1.5; margin: 1em 0; width: 50%;">This is YouTune</p>
                <p style="font-size: 1.2em; line-height: 1.5; margin: 1em 0; width: 50%;">This is YouTune</p>	
                       
                <p><a href="#" id="dialog_link" class="ui-state-default ui-corner-all">
            		<span class="ui-icon ui-icon-newwin"></span>Search</a>
                </p>
                
                <!-- ui-dialog -->
                <div id="dialog" title="Video Search">
                    <p>
                    <!--Video Search Tag -->
                    <div id="content">Loading...</div>
                    <!--Video Search Tag -->
                    </p>
                </div>
			
            </div>
			<div id="tabs-2">
            <!-- Polling the Player -->
                <table>
                    <tr>
                    <td><div id="videoDiv">Loading...</div></td>
                    <td valign="top">
                      <div id="videoInfo">
                        <p>Player state: <span id="playerState">--</span></p>
                        <p>Current Time: <span id="videoCurrentTime">--:--</span> | Duration: <span id="videoDuration">--:--</span></p>
                        <p>Bytes Total: <span id="bytesTotal">--</span> | Start Bytes: <span id="startBytes">--</span> | Bytes Loaded: 
                        <span id="bytesLoaded">--</span></p>
                      </div>
                    </td></tr>
    			</table>
            <!-- Polling the Player -->
            </div>
			<div id="tabs-3">
            			<!--<table>
                            <tr>
                            <td><div id="videoDiv_Change">Loading...</div></td>
                            <td valign="top">
                              <div id="videoControls">
                                <p>Select a video to load:</p>
                                <select id="videoSelection" onchange="loadVideo();">
                                  <option value="ylLzyHk54Z0" selected>YouTube API Overview</option>
                                  <option value="muLIPWjks_M">Ninja Cat</option>
                                  <option value="GMUlhuTkM3w">Beatboxing Flute</option>
                                </select>
                              </div>
                            </td></tr>
                            </table>-->
	            </div>
                
			
		</div>
	</body>
</html>


