<?php 

namespace labonnealerte\classes;

use labonnealerte\classes\Hour;

class Advertisement 
{
    private $hour;
    private $title;

    /** 
     * Contructor
     * @param int $ip_hour  
     * @param int $ip_title 
     */
    public function __construct($ip_hour, $ip_title) {
        $this->title = $ip_title;
        $this->hour = $ip_hour;
    }

    /**
     * setTitle
     * @param string $ip_title title of Advertisement
     */
    public function setTitle($ip_title) {
        $this->title = $ip_title;
    }

    /**
     * getTitle
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * getHour
     * @return int
     */
    public function getHour() {
        return $this->hour;
    }
}
