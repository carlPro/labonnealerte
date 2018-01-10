<?php 

namespace labonnealerte\classes;

use labonnealerte\classes\Date;

class Advertisement 
{
    private $date;
    private $title;

    public function __construct($ip_date, $ip_title) {
        $this->title = $ip_title;
        $this->date = $ip_date;
    }

    public function setTitle($ip_title) {
        $this->title = $ip_title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDate() {
        return $this->date;
    }

    public function test() {
        return "c'est un objet advertisement";
    }
}
