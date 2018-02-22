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
// todo : construire l'objet page en entier
// Remplacer les get par build
class LbaScrapper {

  private $url;
  private $formating;
  private $xpath;
  private $page;

  /*   * ****************************************************************************
   * Contruct the dom object with current url and build the DomX for scrapping, * 
   * build also the static curl object                                          *
   * **************************************************************************** */

  public function __construct($ip_url) {
    $this->url = $ip_url;
    $this->xpath = new LbaXpath($ip_url);
    $this->formating = new Formating();
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
    }
    return $advertisements;
  }

  /**
   * Get all date of a page
   * @return Date
   */
  public function getAllDate() {
    $allDates = $this->xpath->getContentNodeToArray("//aside[@class='item_absolute']/p");
    $allDates = $this->formating->clearEmptyData($allDates);

    foreach ($allDates as $key => $oneDate) {
      $fullDateString = substr(trim($oneDate), -5);
      $HourString = substr($fullDateString, 0, 2);
      $MinuteString = substr($fullDateString, -2);
      if (is_numeric($HourString) && is_numeric($MinuteString)) {
        $allDates[$key] = new Date($HourString, $MinuteString);
      }
    }
    return $allDates;
  }

  /**
   * Get all title of a page
   * @return string
   */
  public function getAllTitle() {
    $allTitle = $this->xpath->getContentNodeToArray("//section[@class='item_infos']/h2[@class='item_title']");
    $allTitle = $this->formating->clearEmptyData($allTitle);
   
    foreach ($allTitle as $key => $oneTitleWithoutEmpty) {
      $allTitle[$key] = trim($oneTitleWithoutEmpty);
    }
    return $allTitle;
  }

  public function getAllUrl() {
    $allUrl = $this->xpath->getContentNodeToArray("//li[@itemtype='http://schema.org/Offer']/a/@href");
    $allUrl = $this->formating->clearEmptyData($allUrl);

    foreach ($allUrl as $key => $oneUrl) {
      $allUrl[$key] = substr(trim($oneUrl), 2);
    }
    return $allUrl;
  }
}
