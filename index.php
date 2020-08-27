<!DOCTYPE html>

<!--
# Software isn't working right now:
#
# NonCopyright 2020 Janic Voser, Mettmenstetten, Switzerland.  All rights reserved.
# YouTube-dl-WebUI Version 0.4
#
# Needed software:  - youtube-dl
#                   - ffmpeg
#                   - atomicparsley
#
# Additional Notes: - Give all needed Rights to the user www-data (webserveruser)
#
# Date: 27/08/2020
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

  <?php //start the PHP (Serversite) Section
        $DOMAIN = "ytdl.server-core.ch"; //Defines the Domain
        $WEBROOT = "/var/www/ytdl"; //Defines The Websites Webroot
        $FDL = "$WEBROOT/Downloads"; //Defines The Download Folder for the Songs
        $DESTINATION ="/home/emby/music"; //Defines The Download Folder for the Media
        $FODL = "$WEBROOT/Downloads/old"; //Defines Where To Store the Downloaded Songs afterwards.
        
        
        $DLParameters = "-i --no-playlist --embed-thumbnail -o '%(title)s.%(ext)s' --merge-output-format mp4"; //Defines the Download Parameters
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
          //echo ("youtube-dl $DLParameters $DLFormat $DLURL");
          echo "<div id=phpbox class=box>";
          exec("cd $FDL && youtube-dl $DLParameters $DLFormat $DLURL");
          echo "<br>";
          $GETFILE = system ("cd $FDL && ls *.m*");        //Get the Filename
          $wgeturl = "https://$DOMAIN/Downloads/old/$GETFILE";
          echo ("<a href=\"$wgeturl\" download>Download File to this Computer</a>");
          echo "<br>";
          exec ("cp $FDL/$GETFILE $FODL/$GETFILE");
          exec ("mv $FDL/$GETFILE $DESTINATION/$GETFILE");
          exec("cd $FDL && rm -f *.m* && rm -f *.webp");
        
          exec("cd $WEBROOT"); //Go back to the Webroot - Remove in the Final version replace
          echo "</div>";
        }
        if(isset($_GET['downloadit'])){ //When button Presset get the variable
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
          //echo ("youtube-dl $DLParameters $DLFormat $DLURL");
          echo "<div id=phpbox class=box>";
          exec("cd $FDL && youtube-dl $DLParameters $DLFormat $DLURL");
          echo "<br>";
          $GETFILE = system ("cd $FDL && ls *.m*");        //Get the Filename
          $wgeturl = "https://$DOMAIN/Downloads/old/$GETFILE";
          echo ("<a href=\"$wgeturl\" download>Download File to this Computer</a>");
          echo "<br>";
          echo "$sendtonas";
          exec ("cp $FDL/$GETFILE $FODL/$GETFILE");
          exec ("rm -f $FDL/$GETFILE");
          exec("cd $FDL && rm -f *.m* && rm -f *.webp");
          
          exec("cd $WEBROOT"); //Go back to the Webroot - Remove in the Final version replace
          echo "</div>";
        }
      ?>
  <!-- End the PHP (Serversite) Section -->
</body><!-- End the Bodysection -->

</html><!-- End the HTML-Section -->