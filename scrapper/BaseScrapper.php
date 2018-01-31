<?php

namespace labonnealerte\scrapper;

class BaseScrapper 
{
   public static $curlObject;
   public static $dom;

   /**
    * Construct
    */
   public function __construct() {
      self::$curlObject = curl_init();
      self::$dom = new \DOMDocument();
   }
}