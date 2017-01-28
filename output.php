<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="scroll-effects/assets/animate.css" />
      <link rel="stylesheet" type="text/css" href="scroll-effects/assets/demo.css" />


      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Webscraper</title>
    </head>
    <body >
      <div class="background  grey lighten-2">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <div class="navbar-fixed">
      <nav class="nav-wrapper grey darken-4">
      <a href="index.php" class="left hide-on-med-and-down" style="margin-left:2%;">Home</a>
           <a href="index.php" class="brand-logo center">Web Scraper</a>
           <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="about.php">About Us</a></li>
      </ul>
 </nav>
      </div>

 <?php
     error_reporting(0);
        include './simple_html_dom.php';

$yt_meta;
       $user;

       $bbc_img_scrap;
       $bbc_title_scrap;
       $bbc_sum_scrap;
       $yt_data_scrap;
       $bbc_time;
       $videoTitle;



        $rad1=$_GET["multi_web"];
      if ($rad1==='bbc') {
          $user='http://www.bbc.com/search?q='.$_GET["user_input"];

          $html= file_get_html($user);
          foreach ($html->find('ol[class=search-results results]')as $bob) {
              $bbc_img_scrap=$bob->find('li article picture');
              $bbc_time=$bob->find('time');
              $bbc_title_scrap=$bob->find('li article div h1');
              $bbc_sum_scrap=$bob->find('li article div p[class="summary long"]');

              for ($i=0;$i<10;$i++) {
                  ?>
                  <div class="mycard">
                                       <div class="card z-depth-3">
                              <div class="card-image waves-effect waves-block waves-light activator">
                                  <script type="text/javascript">
                                    var kee = '<?=$bbc_img_scrap[$i]?>';
                                    var bbcoutput = [kee.slice(0)].join('');
                                    var img=bbcoutput.indexOf('class');
                                    var d = ' activator ';
                                    var bbcoutput = [kee.slice(0,img+7),d,kee.slice(img+7)].join('');
                                    console.log(bbcoutput);
                                     document.write(bbcoutput);
                                  </script>
                              </div>
                              <div class="card-content ">
                                <span class="card-title activator grey-text text-darken-4"><?=$bbc_title_scrap[$i]?><i class="material-icons right">more_vert</i></span>
                                <p class="card-title activator grey-text text-darken-4 ">Click here to know more</p>
                              </div>
                              <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4"><?=$bbc_title_scrap[$i]?><i class="material-icons right">close</i></span>
                                <p><?=$bbc_sum_scrap[$i]?></p>
                              </div>
                            </div>
                            </div>

                   <?php

              }
          }
      }
        if ($rad1==='youtube') {
            $user='https://www.youtube.com/results?search_query='.str_replace(" ", "+", $_GET["user_input"]);
            $html= file_get_html($user);
            foreach ($html->find('ol[class=item-section]')as$bob) {
                function getYoutubeIdFromUrl($url)
                {
                    $parts = parse_url($url);
                    if (isset($parts['query'])) {
                        parse_str($parts['query'], $qs);
                        if (isset($qs['v'])) {
                            return $qs['v'];
                        } elseif (isset($qs['vi'])) {
                            return $qs['vi'];
                        }
                    }
                    if (isset($parts['path'])) {
                        $path = explode('/', trim($parts['path'], '/'));
                        return $path[count($path)-1];
                    }
                    return false;
                }
                $videoTitle= $bob->find('a.yt-uix-tile-link');

                $yt_meta=$bob->find('ul.yt-lockup-meta-info');
                $videodescription=$bob->find('[class="yt-lockup-description yt-ui-ellipsis yt-ui-ellipsis-2"]');


                for ($i=0;$i<19;$i++) {
                    ?>
                  <div class="mycard">
                                        <div class="card z-depth-3">

                                                <div class="video-container "  >

                                                           <iframe width="560" height="315" src="<?="https://www.youtube.com/embed/".substr(getYoutubeIdFromUrl($videoTitle[$i]), 0, 11)?>" frameborder="0" allowfullscreen></iframe>


                                            </div>

                                            <div class="card-content ">

                                       <span class="card-title grey-text text-darken-4">

                                           <script type="text/javascript">

// var output = [tep.slice(0,8),b,tep.slice(8+1)].join('');
    var tep='<?=$videoTitle[$i]?>';
    var b='https://youtube.com';
    var output = [tep.slice(0,8),b,tep.slice(8+1)].join('');
    var c = output.indexOf("class");
    var e =output.indexOf("title");
    // document.write(tep);
    var d = ' target=blank ';
    var output = [tep.slice(0,8),b,tep.slice(8+1,c-18),d,tep.slice(8+1)].join('');
    document.write(output);

console.log(output);

                                               </script>

                                           <i class="material-icons right">more_vert</i></span>
                                   <p class="card-title activator grey-text text-darken-4 ">Know more...</p>
                               </div>
                               <div class="card-reveal">
                                 <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                                 <b> <?=$yt_meta[$i]?></b>
                                 <p><?=$videodescription[$i]?></p>

                               </div>
                             </div>
                             </div>
                       <?php

                }
            }
        }

   ?>
      </div>
   <style>


   .card{
      margin-left: 25%;
      margin-top: 10%;
      width: 50%;
      font-size: 20px;
   }
   .card h1{
      font-size: 25px;
   }
   </style>
   <script src="scroll-effects/assets/viewportchecker.js"></script>
   <script type="text/javascript">

   jQuery(document).ready(function() {
     jQuery('.mycard').addClass("hidden").viewportChecker({
         classToAdd: 'visible animated fadeIn', // Class to add to the elements when they are visible
         offset: 100
        });
   });

   </script>
    </body>
</html>
