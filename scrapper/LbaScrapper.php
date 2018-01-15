<?php

namespace labonnealerte\scrapper;

use labonnealerte\classes\Advertisement;
use labonnealerte\classes\Hour;
use labonnealerte\classes\Page;

class LbaScrapper extends BaseScrapper
{
   private $url;
   private $xpath;
   private $page;

   /******************************************************************************
    * Contruct the dom object with current url and build the DomX for scrapping, * 
    * build also the static curl object                                          *
    ******************************************************************************/
   public function __construct($ip_url) {
      parent::__construct();
      $this->url = $ip_url;

      // For killing html5 errors when I load HTML
      libxml_use_internal_errors(true);

      self::$dom->loadHtml($this->getContent());

      // For killing html5 errors when I capload HTML
      libxml_clear_errors();

      $this->xpath = new \DOMXPath(self::$dom);
   }

   /******************************************
    * Return content of the current web page *
    ******************************************/
   public function getContent() {
      curl_setopt(self::$curlObject, CURLOPT_URL, $this->url);
      // Get request content
      curl_setopt(self::$curlObject, CURLOPT_RETURNTRANSFER, true);
      // No header
      curl_setopt(self::$curlObject, CURLOPT_HEADER, false);
      // Get response
      $output = curl_exec(self::$curlObject);

      if ($output === false) {
         return trigger_error('Erreur curl : ' . curl_error(self::$curlObject), E_USER_WARNING);
      } else {
         return $output;
      }
   }

   // Get Page with who have been created in classes/ todo
   public function getPage() {
      $tbAvertisement = $this->getAllAdvertisement();
      return new Page($tbAvertisement, $this->url);
   }

   public function getAllAdvertisement() {
      $titles = $this->getAllTitle();
      $hours = $this->getAllHour();
      $advertissements = array();

      if (count($titles) == count($hours)) {
         for ($i = 0; $i < count($titles); $i++) {
            $advertissement = new Advertisement($hours[$i], $titles[$i]);
            $advertissements[] = $advertissement;
         }
      }
      return $advertissements;
   }

   // Get Date object who have been created in classes/ todo
   public function getAllHour() {
      $allHour = $this->getContentNodeToArray("//aside[@class='item_absolute']/p");
      $allHour = $this->clearEmptyData($allHour);
      $allHourRes = array();

      foreach ($allHour as $oneDateString) {
         $fullDateString = substr(trim($oneDateString), -5);
         $HourString = substr($fullDateString, 0, 2);
         $MinuteString = substr($fullDateString, -2);
         $allHourRes[] = new Hour($HourString, $MinuteString);
      }

      return $allHourRes; 
   }

   public function getAllTitle() {
      $allTitle = $this->getContentNodeToArray("//section[@class='item_infos']/h2[@class='item_title']");
      return $this->clearEmptyData($allTitle);
   }

   public function clearEmptyData($array) {
      $result = array();
      foreach ($array as $oneItem) {
         if (!$this->isWithoutCaracter($oneItem)) {
            $result[] = $oneItem;
         }
      }
      return $result;
   }

   public function isWithoutCaracter($var) {
      // Delete this line if you want space(s) to count as not empty
      $var = trim($var);
      return (isset($var) === true && $var === '') ? true : false;
   }

   /********************
    * XPath management *
    ********************/
   public function getContentNodeToArray($expression) {
      return $this->xpathQueryToArray($this->xpath->query($expression));
   }

   public function xpathQueryToArray($elements) {
      $tb = array();
      if (!is_null($elements)) {
         foreach ($elements as $element) {
            $nodes = $element->childNodes;
            foreach ($nodes as $node) {
               $tb[] = $node->nodeValue . "\n";
            }
         }
      }
      return $tb;
   }
}

