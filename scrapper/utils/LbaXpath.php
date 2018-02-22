<?php

namespace labonnealerte\scrapper\utils;

class LbaXpath {
  
  public static $curlObject;
  public static $dom;
  private $xpath;
  private $url;

  public function __construct($url) {
    self::$dom = new \DOMDocument();
    self::$curlObject = curl_init();
    $this->xpath = new \DOMXPath(self::$dom);
    $this->url = $url;
    
    // For killing html5 errors when I load HTML
    libxml_use_internal_errors(true);

    self::$dom->loadHtml($this->getContent());

    // For killing html5 errors when I capload HTML
    libxml_clear_errors();

    $this->xpath = new \DOMXPath(self::$dom);
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

  /**
   * Get array of a node request
   */
  public function getContentNodeToArray($expression) {
    return $this->xpathQueryToArray($this->xpath->query($expression));
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
      return trigger_error('Erreur curl : ' . curl_error(self::$curlObject), E_USER_WARNING);
    } else {
      return $output;
    }
  }

}
