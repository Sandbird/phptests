<?php
/**
 * Created by michaelwatts
 * Date: 28/05/2013
 * Time: 10:43
 */

class ScrapeTwo {
  /**
   * @var bool
   */
  private $return_transfer = TRUE;
  private $follow_location = TRUE;
  private $auto_referrer = TRUE;
  /**
   * @var int
   */
  private $connect_timeout = 120;
  private $timeout = 120;
  private $max_redirs = 10;
  /**
   * @var string
   */
  private $useragent = 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8';
  private $url = 'http://bbc.co.uk/news/';
  private $data = '';
  private $scrape_start = '<section class="top-articles">';
  private $scrape_end = '</section>';
  private $scraped_data = '';

  function __construct()
  {

  }

  /**
   * Initiates curl command
   * @return mixed
   */
  private function curl() {
    // Getting options from json options or instance variables if not found
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
   * Sets place in html to scrape between
   * @return string
   */
  private function scrape_between(){
    $this->data = stristr($this->data, $this->scrape_start);         // Stripping all data from before $start
    $this->data = substr($this->data, strlen($this->scrape_start));  // Stripping $start
    $stop = stripos($this->data, $this->scrape_end);           // Getting the position of the $end of the data to scrape
    $this->data = substr($this->data, 0, $stop);        // Stripping all data from after and including the $end of the data to scrape
    $this->scraped_data = $this->data;            // Assign scraped data to instance variable
    return $this->scraped_data;             // Returning the scraped data from the function
  }

  /**
   * Runs the curl function and scrape_between function
   * @return string
   */
  public function run() {
    $this->curl();
    $this->scrape_between();
    return $this->scraped_data;
  }

  /**
   * @param string $scrape_end
   */
  public function setScrapeEnd($scrape_end)
  {
    $this->scrape_end = $scrape_end;
  }

  /**
   * @return string
   */
  public function getScrapeEnd()
  {
    return $this->scrape_end;
  }

  /**
   * @param string $scrape_start
   */
  public function setScrapeStart($scrape_start)
  {
    $this->scrape_start = $scrape_start;
  }

  /**
   * @return string
   */
  public function getScrapeStart()
  {
    return $this->scrape_start;
  }

  /**
   * @param string $url
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }

  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }




}