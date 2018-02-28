<?php

namespace labonnealerte\scrapper\utils;

class Formating {

  /**
   * Clear var with blank space (like taylor swift)
   */
  public static function clearEmptyData($array) {
    $result = array();
    foreach ($array as $oneItem) {
      if (!self::isWithoutCaracter($oneItem)) {
        $result[] = $oneItem;
      }
    }
    return $result;
  }

  /**
   * Detect if a var as caracter
   */
  public static function isWithoutCaracter($var) {
    // Delete this line if you want space(s) to count as not empty
    $var = trim($var);
    return (isset($var) === true && $var === '') ? true : false;
  }

}
