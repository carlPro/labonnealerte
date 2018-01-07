<?php 

namespace labonnealerte\classes;

class Advertisement 
{
    private $hour;
    private $minute;
    private $second;
    private $title;
    
    public function __construct(int $ip_hour, int $ip_minute, int $ip_second, string $ip_title) {
        $this->hour = $ip_hour;
        $this->minute = $ip_minute;
        $this->second = $ip_second;
        $this->title = $ip_title;
    }

    /**
     * Getters and Setters
     */
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

    public function getTitle() {
        return $this->title;
    }

    public function test() {
        return "c'est un objet advertisement";
    }
}
