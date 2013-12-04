<?php
/**
 * Created by michaelwatts
 * Date: 25/05/2013
 * Time: 22:04
 *
 * Limitations found in selecting the correct html between selected elements,
 * have found and using querypath which is like jquery selection but for php
 * Need to join these two together.
 *
 * See ../querypath/scrape-urban_dictionary.php for working example
 */



class Scrape {

  private $return_transfer = TRUE;
  private $follow_location = TRUE;
  private $auto_referrer = TRUE;
  private $connect_timeout = 120;
  private $timeout = 120;
  private $max_redirs = 10;
  private $useragent = 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8';
  private $url = 'http://bbc.co.uk/news/';
  private $data = '';
  private $scraped_data = '';

  /**
   * @param $options
   */
  public function __construct($options) {
    // set the options
    $this->options($options);
    $this->curl();
  }

  /**
   * OPTIONS
      Options are loaded through from json file
      Format for json:
      {
      "CURLOPT_RETURNTRANSFER": true,
      "CURLOPT_CONNECTTIMEOUT": 33,
      "CURLOPT_URL"           : "http://www.itv.com/news/"
      }
   * @param $options
   */
  private function options($options) {
    $this->return_transfer = isset($options['CURLOPT_RETURNTRANSFER']) ? TRUE : FALSE;                          // bool
    $this->follow_location = isset($options['CURLOPT_FOLLOWLOCATION']) ? TRUE : FALSE;                          // bool
    $this->auto_referrer = isset($options['CURLOPT_AUTOREFERER']) ? TRUE : FALSE;                               // bool
    if (isset($options['CURLOPT_CONNECTTIMEOUT'])) $this->connect_timeout = $options['CURLOPT_CONNECTTIMEOUT']; // int
    if (isset($options['CURLOPT_TIMEOUT'])) $this->timeout = $options['CURLOPT_TIMEOUT'];                       // int
    if (isset($options['CURLOPT_MAXREDIRS'])) $this->max_redirs = $options['CURLOPT_MAXREDIRS'];                // int
    if (isset($options['CURLOPT_USERAGENT'])) $this->useragent = $options['CURLOPT_USERAGENT'];                 // string
    if (isset($options['CURLOPT_URL'])) $this->url = $options['CURLOPT_URL'];                                   // string
  }

  /**
   * Init curl command
   * Gets options from json data or instance variables if not found
   * @return mixed
   */
  private function curl() {
    $options = Array(
      CURLOPT_RETURNTRANSFER => $this->return_transfer,
      CURLOPT_FOLLOWLOCATION => $this->follow_location,
      CURLOPT_AUTOREFERER => $this->auto_referrer,
      CURLOPT_CONNECTTIMEOUT => $this->connect_timeout,
      CURLOPT_TIMEOUT => $this->timeout,
      CURLOPT_MAXREDIRS => $this->max_redirs,
      CURLOPT_USERAGENT => $this->useragent,
      CURLOPT_URL => $this->url
    );
    $a = curl_init();
    curl_setopt_array($a, $options);
    $this->data = curl_exec($a);
    curl_close($a);
    return $this->data;
  }

  /**
   * Scrape between html
   * @param $data - data to scrape
   * @param $start - start of html
   * @param $end - end of html
   * @return string
   */
  public function scrape_between($data, $start, $end){
    $data = stristr($data, $start);         // Stripping all data from before $start
    $data = substr($data, strlen($start));  // Stripping $start
    $stop = stripos($data, $end);           // Getting the position of the $end of the data to scrape
    $data = substr($data, 0, $stop);        // Stripping all data from after and including the $end of the data to scrape
    $this->scraped_data = $data;            // Assign scraped data to instance variable
    return $this->scraped_data;             // Returning the scraped data from the function
  }

  /**
   * Gets data (web page) from curl command
   * @return mixed
   */
  public function get_html() {
    return $this->curl();
  }

  /**
   * print html to screen
   */
  public function output_html() {
    echo $this->scraped_data;
  }
}