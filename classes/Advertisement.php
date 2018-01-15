<?php 

namespace labonnealerte\classes;

use labonnealerte\classes\Hour;

class Advertisement 
{
    private $hour;
    private $title;

    public function __construct($ip_hour, $ip_title) {
        $this->title = $ip_title;
        $this->hour = $ip_hour;
    }

    public function setTitle($ip_title) {
        $this->title = $ip_title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getHour() {
        return $this->hour;
    }

    public function test() {
        return "c'est un objet advertisement";
    }
}
