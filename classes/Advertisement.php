<?php

namespace labonnealerte\classes;

use labonnealerte\classes\Hour;

class Advertisement {

  private $date;
  private $title;
  private $url;

  /**
   * Contructor
   * @param int $ip_date  
   * @param int $ip_title 
   */
  public function __construct($ip_date, $ip_title, $ip_url) {
    $this->title = $ip_title;
    $this->date = $ip_date;
    $this->url = $ip_url;
  }

  /**
   * getTitle
   * @return string
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * getDate
   * @return int
   */
  public function getDate() {
    return $this->date;
  }

  /**
   * getUrl
   * @return int
   */
  public function getUrl() {
    return $this->url;
  }

}
