<?php

namespace labonnealerte\classes;

class Hour 
{
    private $hour;
    private $minute;

    public function __construct($ip_hour, $ip_minute) {
        $this->hour = $ip_hour;
        $this->minute = $ip_minute;
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
}
