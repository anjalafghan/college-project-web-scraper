<?php
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
<div class="mycard">
                   <div class="card hoverable  z-depth-3 ">
                        <div class="card-image waves-effect waves-block waves-light activator">
                        <img src="confused_travolta.gif" height="50%" width=" 50% " alt="Data not found">
                        </div>
                       <div class="card-content ">
                           <span class="card-title flow-text activator grey-text text-darken-4" >
                              Data not found
                              </span>
                       </div>


                   </div>
</div>


';

          }
          else {


            for ($i=0;$i<9;$i++) {
if (empty($bbc_img_scrap[$i]))
    {
    if(empty($bbc_title_scrap[$i])){}
    else{
   echo ' <div class="card hoverable z-depth-3">
        <div class="card-image waves-effect waves-block waves-light activator">
            <img src="bbc-logo.jpg"height=" 50% " width="30%" alt="Data not found">
        </div>
        <div class="card-content">
            <span class="card-title flow-text activator grey-text text-darken-4">'
                .$bbc_title_scrap[$i].'
                <i class="material-icons right">more_vert</i>
            </span>
            <p class="card-title activator flow-text grey-text text-darken-4">'.$bbc_time[$i].'</p>
    </div>
        <div class="card-reveal">
            <span class="card-title flow-text grey-text text-darken-4">
               '.$bbc_title_scrap[$i].'
               <i class="material-icons right">close</i>
               <p>'.$bbc_sum_scrap[$i].'</p>

            </span>
        </div>
    </div>';}

    }
 else {echo '<div class="mycard">
                    <div class="card hoverable  z-depth-3 ">
                         <div class="card-image waves-effect waves-block waves-light activator">'.
                             $bbc_img_scrap[$i].
                          '</div>
                        <div class="card-content ">
                            <span class="card-title flow-text activator grey-text text-darken-4" >'
                          .$bbc_title_scrap[$i].
                                '<i class="material-icons right">more_vert</i></span>
                            <p class="card-title flow-text activator grey-text text-darken-4 ">
                          Know more..
                            </p>
                        </div>
                            <div class="card-reveal">
                                <span class="card-title flow-text grey-text text-darken-4">'.
                          $bbc_time[$i].
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
 ';}


              }

      }}
 echo'   </div>';
