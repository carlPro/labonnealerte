<?php

namespace labonnealerte\classes;

class Page 
{
    private $tbAvertissement;
    private $url;

    public function __construct() {

    }

    public function addAvertissement() {

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
