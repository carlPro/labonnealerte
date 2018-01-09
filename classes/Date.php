<?php

namespace labonnealerte\classes;

class Date 
{
    private $year;  
    private $month;
    private $day;
    private $hour;
    private $minute;
    private $second;
    
    public function __construct($ip_year, $ip_month, $ip_day, $ip_hour, $ip_minute, $ip_second) {
        $this->year = $ip_year;
        $this->month = $ip_month;
        $this->day = $ip_day;
        $this->hour = $ip_hour;
        $this->minute = $ip_minute;
        $this->second = $ip_second;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($ip_year) {
        $this->year = $ip_year;
    }

    public function getMonth() {
        return $this->month();
    }

    public function setMonth($ip_month) {
        $this->month = $ip_month;
    }

    public function getDay() {
        return $this->day;
    }

    public function setDay($ip_day) {
        $this->day = $ip_day;
    }

    public function getHour() {
        return $this->hour;
    }

    public function setHour($ip_hour) {
        $this->hour = $ip_hour;
    }

    public function getMinute() {
        return $this->minute;
    }

    public function setMinute($ip_minute) {
        $this->minute = $ip_minute;
    }

    public function getSecond() {
        return $this->second;
    }

    public function setSecond($ip_second) {
        $this->second = $ip_second;
    }
}
