<!DOCTYPE html>
<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="scroll-effects/assets/animate.css" />
        <link rel="stylesheet" type="text/css" href="scroll-effects/assets/demo.css" />
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
        <title>Webscraper</title>

     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

<style media="screen">
  #load{
  width: 100%;
  height: 100%;
  background-color: #fff;
#loaderrow{
background-color: #ff3;
}
  }

</style>
    <body class="background grey lighten-2 ">
 <?php   echo  '<div class="navbar-fixed ">
      <nav class="nav-wrapper grey darken-4 col col s15 m8 l5 ">
          <a href="index.php" class="brand-logo center">Web Scraper</a>
      </nav>
      </div>
      <div id="load">
        <div class="row" id="loaderrow">
          <div class="col s5 m5 l5 center"></div>
          <div class="preloader-wrapper big active">
             <div class="spinner-layer spinner-blue">
               <div class="circle-clipper left">
                 <div class="circle"></div>
               </div><div class="gap-patch">
                 <div class="circle"></div>
               </div><div class="circle-clipper right">
                 <div class="circle"></div>
               </div>
             </div>

             <div class="spinner-layer spinner-red">
               <div class="circle-clipper left">
                 <div class="circle"></div>
               </div><div class="gap-patch">
                 <div class="circle"></div>
               </div><div class="circle-clipper right">
                 <div class="circle"></div>
               </div>
             </div>

             <div class="spinner-layer spinner-yellow">
               <div class="circle-clipper left">
                 <div class="circle"></div>
               </div><div class="gap-patch">
                 <div class="circle"></div>
               </div><div class="circle-clipper right">
                 <div class="circle"></div>
               </div>
             </div>

             <div class="spinner-layer spinner-green">
               <div class="circle-clipper left">
                 <div class="circle"></div>
               </div><div class="gap-patch">
                 <div class="circle"></div>
               </div><div class="circle-clipper right">
                 <div class="circle"></div>
               </div>
             </div>
           </div>
        </div>


      <div id="contents">
<div class="main">';




   echo' <div id="bbc">';

include 'simple_html_dom.php';
function bbc(){
        $user='http://www.bbc.com/search?q='.$_GET["user_input"];
        $html= file_get_html($user);
          foreach ($html->find('ol[class=search-results results]')as $selection) {
              $bbc_img_scrap=$selection->find('li article picture');
              $bbc_time=$selection->find('time');
              $bbc_title_scrap=$selection->find('li article div h1');
              $bbc_sum_scrap=$selection->find('li article div p[class="summary long"]');
          }
          if (empty($bbc_title_scrap)) {

echo '
<div class="mycard "  >
     <div class="card hoverable z-depth-3 ">
          <div class="card-image waves-effect waves-block waves-light activator">
          <img src="confused_travolta.gif"height=" 50% " width="50%" alt="Data not found">
          </div>
         <div class="card-content center">
         <span class="card-title">DATA NOT FOUND!</span>
         </div>
     </div>
</div>

';

          }
          else {


            for ($i=0;$i<9;$i++) {

               echo '<div class="mycard bbc-cards "  >
                    <div class="card hoverable z-depth-3 ">
                         <div class="card-image waves-effect waves-block waves-light activator">'.
                             $bbc_img_scrap[$i].
                          '</div>
                        <div class="card-content ">
                            <span class="card-title activator grey-text text-darken-4" >'
                          .$bbc_title_scrap[$i].
                                '<i class="material-icons right">more_vert</i></span>
                            <p class="card-title activator grey-text text-darken-4 ">
                          '.$bbc_time[$i].
                            '</p>
                        </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">'.
                          $bbc_title_scrap[$i].
                                    '<i class="material-icons right">close</i></span>
                                <p>'.
                          $bbc_sum_scrap[$i].
                                '</p>
                            </div>
                    </div>
                </div>
            <style>
                h1{
                    font-size: 1em;
                }
            </style>
';


              }

      }}
 echo'   </div>';

    function youtube(){

        $user='https://www.youtube.com/results?search_query='.str_replace(" ", "+", $_GET["user_input"]);
        $html= file_get_html($user);
            foreach ($html->find('ol[class=item-section]')as$selection) {
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

                    return false;
                }
                $videoTitle= $selection->find('a.yt-uix-tile-link');

                $yt_meta=$selection->find('ul.yt-lockup-meta-info');
                $videodescription=$selection->find('[class="yt-lockup-description yt-ui-ellipsis yt-ui-ellipsis-2"]');

            }  if (empty($videoTitle)) {
               echo '
               <div class="mycard "  >
                    <div class="card hoverable z-depth-3 ">
                         <div class="card-image waves-effect waves-block waves-light activator">
                         <img src="confused_travolta.gif"height=" 50% " width="50%" alt="Data not found">
                         </div>
                        <div class="card-content center">
                        <span class="card-title">DATA NOT FOUND!</span>
                        </div>
                    </div>
               </div>

               ';
            }else {


                for ($i=0;$i<19;$i++) {
                   if(empty(substr(getYoutubeIdFromUrl($videoTitle[$i]), 0, 11))){

                   }

             else{


                               echo '        <div class="mycard ">
                                        <div class="card hoverable z-depth-3">
                                          <div class="video-container">
                                             <iframe width="25%" height="43%" src="'.'https://www.youtube.com/embed/'.substr(getYoutubeIdFromUrl($videoTitle[$i]), 0, 11).'" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                            <div class="card-content ">
                                       <span class="card-title grey-text text-darken-4">';?>
                                           <script type="text/javascript">
    var tep='<?=$videoTitle[$i]?>';
    var b='https://youtube.com';
    var output = [tep.slice(0,9),b,tep.slice(9)].join('');
    document.write(output);
                                               </script>
                                          <?php echo '<i class="material-icons right">more_vert</i></span>
                                   <p class="card-title activator grey-text text-darken-4 ">Know more...</p>
                               </div>
                               <div class="card-reveal">
                                 <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                                 <b> '.$yt_meta[$i].'</b>
                                 <p>'.$videodescription[$i].'</p>

                               </div>
                             </div>
                             </div>';


                }
                }}
        }


      echo '</div>';


?>


      <div class="row">
          <div class="col s15 m8 l5 ">
                  <div class="card black lighten-1 accent-2 " >
                      <div class="card-title  white-text center-align " >
                        <font size="6">
                          BBC
                        </font>
                      </div>
                  </div>

                  <br>
                  <?= bbc();?>
          </div>
              <div class="col s15 m8 l5  offset-m1 offset-l1">
                  <div class="card  red   " >
                      <div class="card-title red darken-3 white-text center-align " style="padding:5px;" >
                          <font size="6">
                          YouTube
                          </font>
                      </div>
                  </div>
                  <br>
<?= youtube();?>
              </div>
      </div>
      </div>
<script type="text/javascript">
document.onreadystatechange = function () {
var state = document.readyState
if (state == 'interactive') {
    document.getElementById('contents').style.visibility="hidden";
} else if (state == 'complete') {
   setTimeout(function(){
      document.getElementById('interactive');
      document.getElementById('load').style.visibility="hidden";
      document.getElementById('contents').style.visibility="visible";
   },1000);
}
}
</script>
</div>
    </body>
</html>
