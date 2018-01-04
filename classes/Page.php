<?php

namespace labonnealerte\Page;

class Page 
{
    private array tbAvertissement;
    private string url;

    public function __construct() {

    }

    public function addAvertissement() {

    }

    public function setUrl(string ip_url) {
        $this->url = ip_url;
    }

    public function getUrl() {
        return $this->url;
    }

    public function test() {
        return "c'est une objet page";
    }
}
