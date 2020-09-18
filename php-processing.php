<?php //start the PHP (Serversite) Section
        $DOMAIN = "ytdl.yourdomain.com"; //Defines the Domain
        $WEBROOT = "/var/www/ytdl"; //Defines The Websites Webroot
        $FDL = "$WEBROOT/Downloads"; //Defines The Download Folder for the Songs
        $DESTINATION ="/home/emby/music"; //Defines The Download Folder for the Media
        $FODL = "$WEBROOT/Downloads/old"; //Defines Where To Store the Downloaded Songs afterwards.
        
        
        $DLParameters = "-i --no-playlist --embed-thumbnail -o '%(title)s.%(ext)s' --merge-output-format mp4"; //Defines the Download Parameters
        $DLFormat = "x"; //mp3 or mp4 (audio or video) + --audio-format or video-format
        $DLURL = "URL-not-Provided"; //Enter the URL
        $GETFILE ="No File Found";

        exec ("mkdir -p $FODL");
        
        //Get the Variables
        if(isset($_GET['sendit'])){ //When button Presset get the variable
          $DLURL = $_GET['URL']; //Get the variable
          if (!filter_var($DLURL, FILTER_VALIDATE_URL) === false){
            echo ('<script> alert ("Your URL is Valid!")</script>');
        }
          else{
            $DLURL = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";
            echo ('<script> alert ("Your URL is not Valid!")</script>');
        }
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
