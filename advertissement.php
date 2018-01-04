<?php 

/**
 * TODO rename name file
 * Advertissement class
 */

class Advertisement 
{
    private int hour;
    private int minute;
    private int second;
    private string title;

    public function __construct() {

    }

    public function setHour(int $ip_hour) {
        $this->hour = $ip_hour;
    }

    public function getHour() {
        return $this->hour;
    }

    public function setMinute(int $ip_minute) {
        $this->ip_minute = $ip_minute;
    }

    public function getMinute() {
        return $this->minute;
    }

    public function setSecond(int $ip_second) {
        $this->second = $ip_second;
    }

    public function getSecond() {
        return $this->second;
    }

    public function setTitle(string $ip_title) {
        $this->title = $ip_title;
    }
}
