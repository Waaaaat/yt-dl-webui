<!DOCTYPE html>

<!--
# Software isn't working right now:
#
# NonCopyright 2020 Janic Voser, Mettmenstetten, Switzerland.  All rights reserved.
# YouTube-dl-WebUI Version 0.2
#
# Needed software:  - youtube-dl
#                   - ffmpeg
#                   - atomicparsley
#
# Additional Notes: - Give all needed Rights to the user www-data (webserveruser)
#
# Date: 09/07/2020
-->

<html>
<!-- Start the HTML-Section -->

<head>
  <!-- Start the Headsection -->
  <meta charset="UTF-8"> <!-- Set The Website Charset -->
  <title>Youtube-DL WebUI</title> <!-- Set The Website Title -->
  <link rel="stylesheet" type="text/css" href="css/style.css"></link> <!-- Add the Base CSS -->
  <link rel="stylesheet" type="text/css" href="css/downloads.css"></link><!-- Add the Site Custom CSS -->
</head><!-- End the Headsection -->

<body>
  <!-- Start the Bodysection -->
  <ul>
    <li><a class=navi href="index.php">Youtube-Downloader Web</a></li>
    <li><a class=navi href="sites/TaAE.php">Title and Actor Editor</a></li>
    <li><a class=navi href="sites/FilenameEditor.php">Filename Editor (Serversite)</a></li>
    <li><a class=navi href="https://emby.server-core.ch">Emby Media Server</a></li>
    <li><a class=navi href="https://github.com/Waaaaat">Github</a></li>
    <li><a class=navi href="sites/About.php">About</a></li>
  </ul>
  <div id=mainbox class=box>
    <!-- Start the Main Div -->

  </div> <!-- End the Main Div -->

  <?php //start the PHP (Serversite) Section
        $DOMAIN = "ytdl.server-core.ch"; //Defines the Domain
        $WEBROOT = "/var/www/ytdl"; //Defines The Websites Webroot
        $FDL = "$WEBROOT/Downloads"; //Defines The Download Folder for the Songs
        $DESTINATION ="/home/emby/music"; //Defines The Download Folder for the Media
        $FODL = "$WEBROOT/Downloads/old"; //Defines Where To Store the Downloaded Songs afterwards.
        
        
      ?>
  <!-- End the PHP (Serversite) Section -->
</body><!-- End the Bodysection -->

</html><!-- End the HTML-Section -->