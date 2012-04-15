<?PHP
$url = $_REQUEST['url'];
if (eregi("([youtube.com])",$url)){
      preg_match("/[v=][(\w\-\.)]+\w/",$url,$youtube);
      $youtube = str_replace('=','',$youtube[0]);
}

    echo '<script src="http://www.google.com/jsapi"></script>
        <script>
      google.load("swfobject", "2.1");
    </script>
    <script type="text/javascript">

        function updateHTML(elmId, value) {
          document.getElementById(elmId).innerHTML = value;
        }

        function setytplayerState(newState) {
          updateHTML("playerstate", newState);
        }

        function onYouTubePlayerReady(playerId) {
          ytplayer = document.getElementById("myytplayer");
          ytplayer.addEventListener("onStateChange", "onytplayerStateChange");
          ytplayer.addEventListener("onError", "onPlayerError");
        }

        function onPlayerError(errorCode) {
          alert("An error occured: " + errorCode);
        }



        // functions for the api calls
        function loadNewVideo(id, startSeconds) {
          if (ytplayer) {
            ytplayer.loadVideoById(id, parseInt(startSeconds));
          }
        }


        function getDuration() {
          if (ytplayer) {
            return ytplayer.getDuration();
          }
        }


    </script>
    <div id="ytapiplayer">
      You need Flash player 8+ and JavaScript enabled to view this video.
    </div>

    <script type="text/javascript">
      // <![CDATA[

      var params = { allowScriptAccess: "always", bgcolor: "#cccccc", wmode:"transparent" };
      var atts = { id: "myytplayer" };
      swfobject.embedSWF("http://www.youtube.com/v/'.$youtube.'?border=0&amp;enablejsapi=1&amp;playerapiid=ytplayer",
                         "ytapiplayer", "100%", "100%", "8", null, null, params, atts);
      //]]>
    </script>
    
    ';
         
?>
