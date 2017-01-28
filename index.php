<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Web Scraper</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
  <nav class="nav-wrapper  grey darken-4">
           <a href="index.php" class="brand-logo center">Web Scraper</a>
           <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="about.php">About Us</a></li>
      </ul>
 </nav>
    <div class="section no-pad-bot" id="index-banner">
    </div>

<div class="mycard">
    <form action="output.php" method="GET">
        <div class="row">
      <div class="col s12 m5">
        <div class="card-panel white z-depth-5">
          <span class="black-text">
            <!-- below text input -->
              <div class="row">
       <div class="input-field col s12">
         <input id="Keyword" type="text" name="user_input" class="validate ">
         <label for="Keyword" >Keyword</label>
       </div>
     </div>
     <div>
       <input-field>
       <div class="input-field col s12">
 <select name="multi_web">
   <option class="bbc2" value="bbc">BBC</option>
   <option class="you2" value="youtube">YouTube</option>
 </select>
 <label>Select Website</label>
</div>
       </input-field>
     </div>
     <!-- button below -->
     <button class="btn waves-effect waves-light" type="submit" name="action">
    <input type="submit" value="submit" name="submit" />
  </button>
     <!-- container ends below -->
        </div>
      </div>
    </div>
    </form>
</div>




<style>
.mycard{
  margin-left: 37%;
  margin-top: 10%;
align-items: center;
align-content: center;
}
.mycard button{
margin-left: 25%;
}

</style>

        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script type="text/javascript"></script>
        <script>
        $(document).ready(function() {
            $('select').material_select();
             $(".button-collapse").sideNav();
          });
        </script>


</body>

</html>
