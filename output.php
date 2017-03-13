<!DOCTYPE html>
<html>
    <head>
    <link href="./iconfont/material-icons.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
        <title>Webscraper</title>


     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="background grey lighten-2 ">
<div class="navbar-fixed ">
      <nav class="nav-wrapper grey darken-4 col s15 m8 l5 ">
          <a href="index.php" class="brand-logo center">Web Scraper</a>
      </nav>
      </div>

<div class="container">
    <?php
include 'simple_html_dom.php';
include 'bbc.php';
include 'youtube.php';
?>
    <div class="row">


            <div class="col s12 m10 l6 offset-m1">
                <div class="card  black " >
                    <div class="card-title black  white-text center-align " style="padding:5px;" >
                        <font size="6">
                        BBC
                        </font>
                    </div>
                </div>
                    <?= bbc();?>
            </div>
            <div class="col s12 m10 l6 offset-m1 ">
                <div class="card  red " >
                    <div class="card-title red darken-3 white-text center-align " style="padding:5px;" >
                        <font size="6">
                        YouTube
                        </font>
                    </div>
                </div>

      <?= youtube();?>
            </div>
            </div>

    </div>


    </body>
</html>
