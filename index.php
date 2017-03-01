  <!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0"/>
    <title>Web Scraper</title>
    <link href="./iconfont/material-icons.css" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="js/materialize.js"></script>
</head>

<body class="background grey lighten-3">
  <nav class="nav-wrapper grey darken-4">
           <a href="index.php" class="brand-logo center">Web Scraper</a>
           <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="about.php">About Us</a></li>
      </ul>
 </nav>

<div class="container ">
  <ul class="collapsible z-depth-2 " data-collapsible="accordion">
      <li>
        <div class="collapsible-header waves-effect">Enter Keyword</div>
        <div class="collapsible-body white lighten-2">
          <div class="row">
              <form class="col s12" action="output.php" method="get">
              <div class="input-field inline col s12" onclick="Materialize.toast('Type what you want to search :)', 4000);">
                <input id="Keyword" class="validate" type="text" name="user_input" required>
              <label for="Keyword">Keyword</label>
              </div>
            </form>
          </div>
        </div>
      </li>
        </ul>
<style media="screen">
  body .container{
    margin-top: 15%;
  }
</style>

</div>


</body>

</html>
<script type="text/javascript">
$(document).ready(function(){
$('.collapsible').collapsible();
});

</script>
