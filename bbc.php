<?php include './simple_html_dom.php'; 
$user='http://www.bbc.com/search?q='.$_GET["user_input"];

$bbc_img_scrap;
$bbc_time;
$bbc_title_scrap;
$bbc_sum_scrap;
bbc_initial();       

    function bbc_initial(){
          $html=file_get_html('http://www.bbc.com/search?q='.$_GET["user_input"]);
     foreach ($html->find('ol[class=search-results results]')as $bob) {
              $bbc_img_scrap=$bob->find('li article picture');
              $bbc_time=$bob->find('time');
              $bbc_title_scrap=$bob->find('li article div h1');
              $bbc_sum_scrap=$bob->find('li article div p[class="summary long"]');
          }
          echo implode(" ", $bbc_img_scrap);
          echo implode(" ", $bbc_sum_scrap);
          echo implode(" ", $bbc_time);
          echo implode(" ", $bbc_title_scrap);
    }
         