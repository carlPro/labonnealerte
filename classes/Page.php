<?php

namespace labonnealerte\classes;

use labonnealerte\classes\{
  Advertisement,
  Date
};

class Page {

  private $tbAvertisement;
  private $url;

  public static function isSame($pageBdd, $pageInternet) {
    if ($pageBdd->getUrl() != $pageInternet->getUrl()) {
      return false;
    }

    $tbBddAvertisement = $pageBdd->getTbAvertisement();
    $tbInternetAvertisement = $pageInternet->getTbAvertisement();

    foreach ($tbBddAvertisement as $key => $bddAdvert) {
      $internetAdvert = $tbInternetAvertisement[$key];
      
      if ($bddAdvert->getUrl() != $internetAdvert->getUrl()) {
        return false;
      }
    }
    return true;
  }
  
  /**
  * Return new advert
  * @return Advertisement[]
  */
  public static function getNewAverts($pageBdd, $pageInternet) {
    $newAdverts = array();
    $tbBddAvertisement = $pageBdd->getTbAvertisement();
    $tbInternetAvertisement = $pageInternet->getTbAvertisement();
    
    foreach ($tbInternetAvertisement as $internetAdvert) {
      
      if (in_array($internetAdvert, $tbBddAvertisement) == false) {
        $newAdverts[] = $internetAdvert;
      }
    }
    return $newAdverts;
  }
  
  /**
   * setTbAdvertisement
   * @param array $ip_tbAdvertisement
   */
  public function setTbAvertisement($ip_tbAdvertisement) {
    $this->tbAvertisement = $ip_tbAdvertisement;
  }

  public function getTbAvertisement() {
    return $this->tbAvertisement;
  }

  /**
   * setUrl
   * @param string $ip_url
   */
  public function setUrl($ip_url) {
    $this->url = $ip_url;
  }

  /**
   * getUrl
   * @return string
   */
  public function getUrl() {
    return $this->url;
  }

  public function addAdvert($advert) {
    $this->tbAvertisement[] = $advert;
  }
}
