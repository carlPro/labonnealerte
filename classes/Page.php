<?php

namespace labonnealerte\classes;

use labonnealerte\classes\Advertisement;

class Page 
{
    private $tbAvertissement;
    private $url;

    /** 
     * setTbAdvertisement
     * @param array $ip_tbAdvertisement
     */
    public function setTbAvertissement($ip_tbAdvertisement) {
        $this->tbAvertissement = $ip_tbAdvertisement;
    }

    public function getTbAvertissement() {
        return $this->tbAvertissement;
    }

    /**
     * setUrl
     * @param string $ip_url
     */
    public function setUrl($ip_url) {
        $this->url = $ip_url;
    }

    /**
     * getUrl
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }
}
