<?php

include 'Scrape.php';

// Set options with json
$json_options = '
  {
    "CURLOPT_RETURNTRANSFER": true,
    "CURLOPT_FOLLOWLOCATION": true,
    "CURLOPT_AUTOREFERER": true,
    "CURLOPT_CONNECTTIMEOUT": 120,
    "CURLOPT_TIMEOUT":120,
    "CURLOPT_MAXREDIRS":10,
    "CURLOPT_USERAGENT": "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8",
    "CURLOPT_URL": "http://www.itv.com/news/"
  }';
// decode json to array
$options = json_decode($json_options, true);

// Create new Curl object
$scraper = new Scrape($options);

$scraper->scrape_between($scraper->get_html(), '<section class="top-articles">', '</section>');
$scraper->output_html();

