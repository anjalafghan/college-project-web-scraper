<?php
//.'&gl=IN&hl=en-GB
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
               <div class="mycard">
                                  <div class="card hoverable  z-depth-3 ">
                                       <div class="card-image waves-effect waves-block waves-light activator">
                                       <img src="confused_travolta.gif" height="50%" width=" 50% " alt="Data not found">
                                       </div>
                                      <div class="card-content ">
                                          <span class="card-title flow-text activator grey-text text-darken-4" >
                                             Data not found!
                                             </span>
                                      </div>


                                  </div>
               </div>


               ';
            }
            else
                {


                for ($i=0;$i<19;$i++) {
                   if(empty(getYoutubeIdFromUrl($videoTitle[$i])))//removes all user accounts
                           {

                   }

             else
                 {
                 if(empty($videodescription[$i])){
                      echo '        <div class="mycard ">
                                        <div class="card col s12 m9 l3 hoverable z-depth-3">
                                          <div class="video-container">
                                             <iframe width="25%" height="43%" src="'.'https://www.youtube.com/embed/'.substr(getYoutubeIdFromUrl($videoTitle[$i]), 0, 11).'" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                            <div class="card-content ">
                                       <span class="card-title flow-text grey-text text-darken-4">';?>
                                           <script type="text/javascript">
    var tep='<?=$videoTitle[$i]?>';
    var b='https://youtube.com';
    var output = [tep.slice(0,9),b,tep.slice(9)].join('');
    document.write(output);

                                               </script>
                                          <?php echo '<i class="material-icons right">more_vert</i></span>
                                   <p class="card-title activator grey-text flow-text text-darken-4 ">Know more...</p>
                               </div>
                               <div class="card-reveal">
                                 <span class="card-title flow-text grey-text text-darken-4"><i class="material-icons right">close</i></span>
                                 <b> '.$yt_meta[$i].'</b>
                                 <img src="confused_travolta.gif"height=" 50% " width="50%" alt="Data not found">

                               </div>
                             </div>
                             </div>';
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
                                   <p class="card-title flow-text activator grey-text text-darken-4 ">Know more...</p>
                               </div>
                               <div class="card-reveal">
                                 <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                                 <b> '.$yt_meta[$i].'</b>
                                 <p>'.$videodescription[$i].'</p>

                               </div>
                             </div>
                             </div>';


                 }}
                }}
        }


      echo '</div>';
