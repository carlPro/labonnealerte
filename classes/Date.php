<?php

namespace labonnealerte\classes;

class Date {

  private $hour;
  private $minute;

  /**
   * Constructor
   * @param int $ip_hour
   * @param int $ip_minute
   */
  public function __construct($ip_hour, $ip_minute) {
    $this->hour = $ip_hour;
    $this->minute = $ip_minute;
  }

  /**
   * getHour
   * @return int
   */
  public function getHour() {
    return $this->hour;
  }

  /**
   * setHour
   * @param int $ip_hour
   */
  public function setHour($ip_hour) {
    $this->hour = $ip_hour;
  }

  /**
   * getMinute
   * @return int
   */
  public function getMinute() {
    return $this->minute;
  }

  /**
   * setMinute
   * @param int $ip_minute
   */
  public function setMinute($ip_minute) {
    $this->minute = $ip_minute;
  }

}
