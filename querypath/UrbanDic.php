<?php
/**
 * Created by michaelwatts
 * Date: 29/05/2013
 * Time: 09:57
 *
 * Gets mulitple words per page
 * Dependancies: querypath (src/qp.php);
 */

class UrbanDic {

  /**
   * @var
   */
  private $page_num;
  /**
   * @var
   */
  private $url;
  /**
   * @var array
   */
  private $word = array();
  /**
   * @var array
   */
  private $definition = array();
  /**
   * @var array
   */
  private $example = array();

  function __construct()
  {

  }

  private function get_word($index, $element){

  }

  /**
   * @param mixed $definition
   */
  public function setDefinition($definition)
  {
    $this->definition = $definition;
  }

  /**
   * @return mixed
   */
  public function getDefinition()
  {
    return $this->definition;
  }

  /**
   * @param mixed $example
   */
  public function setExample($example)
  {
    $this->example = $example;
  }

  /**
   * @return mixed
   */
  public function getExample()
  {
    return $this->example;
  }

  /**
   * @param mixed $page_num
   */
  public function setPageNum($page_num)
  {
    $this->page_num = $page_num;
  }

  /**
   * @return mixed
   */
  public function getPageNum()
  {
    return $this->page_num;
  }

  /**
   * @param mixed $url
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }

  /**
   * @return mixed
   */
  public function getUrl()
  {
    return $this->url;
  }

  /**
   * @param mixed $word
   */
  public function setWord($word)
  {
    $this->word = $word;
  }

  /**
   * @return mixed
   */
  public function getWord()
  {
    return $this->word;
  }

}