<?php
/**
 * Created by michaelwatts
 * Date: 28/05/2013
 * Time: 11:44
 * Test of querypath (https://github.com/technosophos/querypath) for scraping purposes
 */

require_once 'src/qp.php';

print '<h3 style="text-transform: uppercase; margin-top: 1em">Urban Dictionary Random Word Generator</h3>';

$page = rand(0, 288);
$qp = htmlqp('http://www.urbandictionary.com/?page='.$page, '#home');
$wo = $qp->find('.word');
$d = $qp->find('.definition');
$e = $qp->find('.example');

// GET WORD
$word = array();
function get_word($index, $element) {
  //print $woement->tagName . PHP_EOL;
  global $word;
  array_push($word, trim($element->nodeValue));
}
$wo->each('get_word');

// GET DEFINITION
$def = array();
function get_definition($index, $element) {
  global $def;
  array_push($def, trim($element->nodeValue));
}
$d->each('get_definition');

// GET USAGE EXAMPLE
$ex = array();
function get_example($index, $element) {
  global $ex;
  array_push($ex, trim($element->nodeValue));
}
$e->each('get_example');

$nodes = array();
$group = array();

foreach($word as $key => $item){
  for($i = 0; $i <= 2; $i++) {
    $nodes[0] =  $word[$key];
    $nodes[1] =  $def[$key];
    $nodes[2] =  $ex[$key];
  }
  $group[] = $nodes;
}

function output_array() {
  global $group;
  echo '<pre>';
  print_r($group);
  echo '</pre>';
}



function output_html(){
  global $group;
  echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>';
  echo '<script src="masonry.js"></script>';
  echo "<script>
$(function(){
  $('#container').masonry();
});
</script>";
  echo '<div id="container">';
  foreach ($group as $word) {
    echo '<div class="item" style="width: 200px; padding: 20px; margin: 5px; background: #DDD; float: left">';
    echo '<h2>'.$word[0].'</h2>';
    echo '<h3>'.$word[1].'</h3>';
    echo '<p style="padding: 10px; background: #FFF; border-radius: 5px;"><i>'.$word[2].'</i></p>';
    echo '</div>';
  }
  echo '</div>';
}



output_html();