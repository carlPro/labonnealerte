<?php

namespace labonnealerte\scrapper;

use labonnealerte\classes\{Advertisement, Date, Page};

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

   /**
    * Get page object from url
    * @return Page
    */
   public function getPage() {
      $page = new Page();
      $page->setUrl($this->url);
      $page->setTbAvertisement($this->getAllAdvertisement());
      return $page;
   }

   /**
    * Get all advert of a page
    * @return Advertisement[]
    */
   public function getAllAdvertisement() {
      $dates = $this->getAllDate();
      $titles = $this->getAllTitle();
      $advertisements = array();

      if (count($titles) == count($dates)) {
         for ($i = 0; $i < count($titles); $i++) {
            $advertissement = new Advertisement($dates[$i], $titles[$i]);
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
      $allDatesRes = array();

      $allDates = $this->getContentNodeToArray("//aside[@class='item_absolute']/p");
      $allDates = $this->clearEmptyData($allDates);

      foreach ($allDates as $oneDate) {
         $fullDateString = substr(trim($oneDate), -5);
         $HourString = substr($fullDateString, 0, 2);
         $MinuteString = substr($fullDateString, -2);
         if (is_numeric($HourString) && is_numeric($MinuteString)) {
            $allDatesRes[] = new Date($HourString, $MinuteString);
         }
      }
      return $allDatesRes; 
   }

   /**
    * Get all title of a page
    * @return string
    */
   public function getAllTitle() {
      $allTitleClean = array();

      $allTitle = $this->getContentNodeToArray("//section[@class='item_infos']/h2[@class='item_title']");
      $allTitleWithoutEmpty = $this->clearEmptyData($allTitle);

      foreach ($allTitleWithoutEmpty as $oneTitleWithoutEmpty) {
         $allTitleClean[] = trim($oneTitleWithoutEmpty);
      }
      return $allTitleClean;
   }

   /**
    * Clear var with blank space (like taylor swift)
    */
   public function clearEmptyData($array) {
      $result = array();
      foreach ($array as $oneItem) {
         if (!$this->isWithoutCaracter($oneItem)) {
            $result[] = $oneItem;
         }
      }
      return $result;
   }

   /**
    * Detect if a var as caracter
    */
   public function isWithoutCaracter($var) {
      // Delete this line if you want space(s) to count as not empty
      $var = trim($var);
      return (isset($var) === true && $var === '') ? true : false;
   }

   /********************
    * XPath management *
    ********************/

   /**
    * Get array of a node request
    */
   public function getContentNodeToArray($expression) {
      return $this->xpathQueryToArray($this->xpath->query($expression));
   }

   /**
    * Return tb of elements
    */
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

