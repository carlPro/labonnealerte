<?php

namespace labonnealerte\scrapper;

class BaseScrapper 
{
   public static $curlObject;
   public static $dom;

   public function __construct() {
      self::$curlObject = curl_init();
      self::$dom = new \DOMDocument();
   }

   public function __destruct() {
      curl_close(self::$curlObject);
   }
}