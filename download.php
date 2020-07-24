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

<html><!-- Start the HTML-Section -->
  <head> <!-- Start the Headsection -->
    <meta charset="UTF-8"> <!-- Set The Website Charset -->
    <title>Youtube-DL WebUI</title> <!-- Set The Website Title -->
    <link rel="stylesheet" type="text/css" href="css/downloads.css"><!-- Add the Custom CSS -->
  </head><!-- End the Headsection -->
  <body><!-- Start the Bodysection -->
    <center> <!-- Delete in Final Version - Replace with css -->
    <div> <!-- Start the Main Div -->

      <form> <!-- Start the Form -->
        <input type="text" name="URL" placeholder="Please Enter the URL of your Youtube Video">

        <select class="" name="VoAF"> <!-- Get The Format Variable (Video or Audio Format)-->
          <option>MP3</option> <!-- Add the MP3 (Music) option -->
          <option>MP4</option> <!-- Add the MP4 (Video) option -->
        </select> <!-- End the select section -->

        <br> <!-- Delete in Final Version - Replace with css -->

        <label class="switch"> <!-- Create the Switch-Label -->
          <input type="checkbox"> <!-- This Ceckbox is the Switch  ( A Switch is just a Ceckbox with MAKEUP !) without this the Switch wouldn't be switchable-->
          <span class="slider round"></span> <!-- Create the Switch-Span -->
        </label>
        <p>Click the Switch to Remove Thumbnail, by default (green) it adds the Thumbnail</p>

        <br> <!-- Delete in Final Version - Replace with css -->

        <button name="sendit" value="sendit" type="submit">SEND IT !</button>

    </form> <!-- End the Form -->

    </div> <!-- End the Main Div -->

    <br> <!-- Delete in Final Version - Replace with css -->
    <br> <!-- Delete in Final Version - Replace with css -->
    <br> <!-- Delete in Final Version - Replace with css -->


    <?php //start the PHP (Serversite) Section
      $DOMAIN = "webtest.server-core.ch"; //Defines the Domain
      $WEBROOT = "/var/www/webtests"; //Defines The Websites Webroot
      $FDL = "$WEBROOT/Downloads"; //Defines The Download Folder for the Songs
      $DESTINATION ="$WEBROOT/Downloads/media"; //Defines The Download Folder for the Media
      $FODL = "$WEBROOT/Downloads/old"; //Defines Where To Store the Downloaded Songs afterwards.


      $DLParameters = "-i --no-playlist --embed-thumbnail --merge-output-format mp4"; //Defines the Download Parameters
      $DLFormat = "x"; //mp3 or mp4 (audio or video) + --audio-format or video-format
      $DLURL = "URL-not-Provided"; //Enter the URL
      $GETFILE ="No File Found";

      //Get the Variables
      if(isset($_GET['sendit'])){ //When button Presset get the variable
        $DLURL = $_GET['URL']; //Get the variable
        $VoAF = $_GET['VoAF']; //Get the variable

        switch ($VoAF) { //Check witch format to use
          case 'MP3': //In case of MP3 selected use following
            $DLFormat = "-f 'bestaudio[ext=m4a]/bestvideo+bestaudio'"; //Audio Format
            break;
          case 'MP4'://In case of MP4 selected use following
            $DLFormat = "-f 'bestvideo[ext=mp4]+bestaudio[ext=m4a]/bestvideo+bestaudio'";//Video Format
            break;
          }

        exec("cd $FDL && youtube-dl $DLParameters $DLFormat $DLURL");
        echo "<br>";
        $GETFILE = system ("cd $FDL && ls *.m*");        //Get the Filename
        $wgeturl = "https://$DOMAIN/Downloads/old/$GETFILE";
        echo ("<a href=\"$wgeturl\" download>Download File to this Computer</a>");
        echo "<br>";
        exec ("cp $FDL/$GETFILE $FODL/$GETFILE");
        exec ("mv $FDL/$GETFILE $DESTINATION/$GETFILE");
        echo "<br>"; // Remove in the Final version


        exec("cd $WEBROOT"); //Go back to the Webroot - Remove in the Final version replace
      }
    ?> <!-- End the PHP (Serversite) Section -->

  </center> <!-- Delete in Final Version - Replace with css -->
  </body><!-- End the Bodysection -->
</html><!-- End the HTML-Section -->
