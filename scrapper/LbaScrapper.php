<?php

namespace labonnealerte\scrapper;

class LbaScrapper extends BaseScrapper
{
   private $url;
   private $xpath;

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

   }

   // Get Advertisement object who have been created in classes/ todo
   public function getAdvertisement() {

   }

   // Get Date object who have been created in classes/ todo
   public function getDate() {

   }

   /***********************************************
    * Desctruct the curlObject when it isn't used *
    ***********************************************/
   function __destruct() {
      parent::__destruct();
   }
}