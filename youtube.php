<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './simple_html_dom.php';
 
          $html2= file_get_html('https://www.youtube.com/results?search_query='.str_replace(" ", "+", $_GET["user_input"]));
            foreach ($html2->find('ol[class=item-section]')as$bob) {
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
                $videoTitle= $bob->find('a.yt-uix-tile-link');
              
                $yt_meta=$bob->find('ul.yt-lockup-meta-info');
                $videodescription=$bob->find('[class="yt-lockup-description yt-ui-ellipsis yt-ui-ellipsis-2"]');

            }
            for ($i=0;$i<19;$i++) {
                   if(empty(substr(getYoutubeIdFromUrl($videoTitle[$i]), 0, 11))){
                       
            } 
 else {
     echo '<iframe width="560" height="315" src="'.'https://www.youtube.com/embed/'.substr(getYoutubeIdFromUrl($videoTitle[$i]), 0, 11).'" frameborder="0" allowfullscreen></iframe><br>';
 echo $yt_meta[$i]."<br>";
 echo $videodescription[$i]."<br>";
     
 }
                   }