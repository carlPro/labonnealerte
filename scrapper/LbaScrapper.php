<?php

namespace labonnealerte\scrapper;

class LbaScrapper extends BaseScrapper
{
   private $url;

   public function __construct($ip_url) {
      parent::__construct();
      $this->url = $ip_url;
   }

   public function getContent() {
      curl_setopt(self::$curlObject, CURLOPT_URL, $this->url);
      // Get request content
      curl_setopt(self::$curlObject, CURLOPT_RETURNTRANSFER, true);
      // No header
      curl_setopt(self::$curlObject, CURLOPT_HEADER, false);
      // Get response
      $output = curl_exec(self::$curlObject);

      if ($output === false) {
         return trigger_error('Erreur curl : '.curl_error(self::$curlObject),E_USER_WARNING);
      } else {
         return $output;
      }
   }
}