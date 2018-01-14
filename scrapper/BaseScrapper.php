<?php

namespace labonnealerte\scrapper;

class BaseScrapper 
{
   public static $curlObject;

   public function __construct() {
      self::$curlObject = curl_init();
   }

   public function __destruct() {
      curl_close(self::$curlObject);
   }
}