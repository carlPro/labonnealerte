<?php

namespace labonnealerte\scrapper;

use labonnealerte\classes\{
  Advertisement,
  Date,
  Page
};
use labonnealerte\scrapper\utils\{
  LbaXpath,
  Formating
};

class LbaScrapper {

  private $url;
  private $xpath;
  private $page;

  public function __construct($ip_url) {
    $this->url = $ip_url;
    $this->xpath = new LbaXpath($ip_url);
    $this->page = new Page();
  }

  /**
   * Get page object from url
   * @return Page
   */
  public function getPage() {
    $this->page->setUrl($this->url);
    $this->page->setTbAvertisement($this->getAllAdvertisement());

    return $this->page;
  }

  /**
   * Get all advert of a page
   * @return Advertisement[]
   */
  public function getAllAdvertisement() {
    $dates = $this->getAllDate();
    $titles = $this->getAllTitle();
    $urls = $this->getAllUrl();

    $advertisements = array();

    if (count($titles) == count($dates) && count($titles) == count($urls)) {
      for ($i = 0; $i < count($titles); $i++) {
        $advertissement = new Advertisement($dates[$i], $titles[$i], $urls[$i]);
        $advertisements[] = $advertissement;
      }
    } else {
      echo "Oups ! Number off dates titles and urls doesn't match"; 
    }
    return $advertisements;
  }

  /**
   * Get all date of a page
   * @return Date
   */
  public function getAllDate() {
    $allDatesFromUrl = Formating::clearEmptyData($this->xpath->getContentNodeToArray(Balise::date));

    foreach ($allDatesFromUrl as $key => $oneDateFromUrl) {
      $dateString = $this->getDateString($oneDateFromUrl);
      $HourString = $this->getHourString($dateString);
      $MinuteString = $this->getMinuteString($dateString);
      
      if (is_numeric($HourString) && is_numeric($MinuteString)) {
        $allDatesFromUrl[$key] = new Date($HourString, $MinuteString);
      }
    }
    return $allDatesFromUrl;
  }
  
  public function getDateString($dateFromUrl) {
    return substr(trim($dateFromUrl), -5);
  }
  
  public function getHourString($dateString) {
    return substr($dateString, 0, 2);
  }
  
  public function getMinuteString($dateString) {
    return substr($dateString, -2);
  }

  /**
   * Get all title of a page
   * @return string
   */
  public function getAllTitle() {
    $allTitle = $this->xpath->getContentNodeToArray(Balise::title);
    $allTitle = Formating::clearEmptyData($allTitle);
   
    foreach ($allTitle as $key => $oneTitleWithoutEmpty) {
      $allTitle[$key] = trim($oneTitleWithoutEmpty);
    }
    return $allTitle;
  }

  public function getAllUrl() {
    $allUrl = $this->xpath->getContentNodeToArray(Balise::url);
    $allUrl = Formating::clearEmptyData($allUrl);

    foreach ($allUrl as $key => $oneUrl) {
      $allUrl[$key] = substr(trim($oneUrl), 2);
    }
    return $allUrl;
  }
}
