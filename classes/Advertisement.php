<?php 

namespace labonnealerte\classes;

use labonnealerte\classes\Hour;

class Advertisement 
{
    private $date;
    private $title;

    /** 
     * Contructor
     * @param int $ip_date  
     * @param int $ip_title 
     */
    public function __construct($ip_date, $ip_title) {
        $this->title = $ip_title;
        $this->date = $ip_date;
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
     * getdate
     * @return int
     */
    public function getDate() {
        return $this->date;
    }
}
