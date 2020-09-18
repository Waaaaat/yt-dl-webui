<!DOCTYPE html>

<!--
# Software isn't working right now:
#
# NonCopyright 2020 Janic Voser, Mettmenstetten, Switzerland.  All rights reserved.
# YouTube-dl-WebUI Version 0.5
#
# Needed software:  - youtube-dl
#                   - ffmpeg
#                   - atomicparsley
#
# Additional Notes: - Give all needed Rights to the user www-data (webserveruser)
#
# Date: 18/09/2020
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
    <li><a class=navi href="https://emby.yourdomain.com">Emby Media Server</a></li>
    <li><a class=navi href="https://github.com/Waaaaat">Github</a></li>
    <li><a class=navi href="sites/About.php">About</a></li>
  </ul>
  <div id=mainbox class=box>
    <!-- Start the Main Div -->

    <form>
      <!-- Start the Form -->
      <input type="text" name="URL" placeholder="Please Enter the URL of your Youtube Video">

      <select class="" name="VoAF">
        <!-- Get The Format Variable (Video or Audio Format)-->
        <option>MP3</option> <!-- Add the MP3 (Music) option -->
        <option>MP4</option> <!-- Add the MP4 (Video) option -->
      </select> <!-- End the select section -->

      <br> <!-- Delete in Final Version - Replace with css -->
      <div class=divlabel>
        <label class="switch">
          <!-- Create the Switch-Label -->
          <input type="checkbox" id="sentonas" name="sendtonas" value='1'></input>
          <!-- This Ceckbox is the Switch  ( A Switch is just a Ceckbox with MAKEUP !) without this the Switch wouldn't be switchable-->
          <span class="slider round"></span> <!-- Create the Switch-Span -->
        </label>
        Send Title to Emby Media Server
      </div>

      <br> <!-- Delete in Final Version - Replace with css -->
      <div>
        <button name="sendit" value="sendit" type="submit">SEND IT !</button>
        <button name="downloadit" value="downloadit" type="submit">DOWNLOAD IT !</button>
      </div>
    </form> <!-- End the Form -->

  </div> <!-- End the Main Div -->
<?php include 'php-processing.php' ?> <!-- Include the PHP Code -->

</body><!-- End the Bodysection -->

</html><!-- End the HTML-Section -->
