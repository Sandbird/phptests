<?php
/**
 * Created by michaelwatts
 * Date: 29/05/2013
 * Time: 09:51
 */
require_once 'src/qp.php';
require_once "UrbanDic.php";
?>
<html>
  <head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="masonry.js"></script>
    <script>
      $(function(){
        $('#container').masonry();
      });
    </script>
  </head>
  <body>
    <h3 style="text-transform: uppercase; margin-top: 1em">Urban Dictionary Random Word Generator</h3>
    <div id="container">
      <div class="item" style="width: 200px; padding: 20px; margin: 5px; background: #DDD; float: left">
        <h2></h2>
        <h3></h3>
        <p style="padding: 10px; background: #FFF; border-radius: 5px;"><i></i></p>
      </div>
    </div>

  </body>
</html>