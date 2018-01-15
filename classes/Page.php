<?php

namespace labonnealerte\classes;

use labonnealerte\classes\Advertisement;

class Page 
{
    private $tbAvertissement;
    private $url;

    public function __construct($ip_tbAvertissement, $ip_url) {
        $this->tbAvertissement = $ip_tbAvertissement;
        $this->url = $ip_url;
    }

    public function setTbAvertissement($ip_tbAdvertisement) {
        $tbAvertissement = $ip_tbAdvertisement;
    }

    public function setUrl($ip_url) {
        $this->url = $ip_url;
    }

    public function getUrl() {
        return $this->url;
    }

    public function test() {
        return "c'est une objet page";
    }
}
