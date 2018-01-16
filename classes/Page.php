<?php

namespace labonnealerte\classes;

use labonnealerte\classes\Advertisement;

class Page 
{
    private $tbAvertissement;
    private $url;

    /**
     * Contructor
     * @param array $ip_tbAvertissement Tableau if advertisement
     * @param string $ip_url
     */
    public function __construct($ip_tbAvertissement, $ip_url) {
        $this->tbAvertissement = $ip_tbAvertissement;
        $this->url = $ip_url;
    }

    /** 
     * setTbAdvertisement
     * @param array $ip_tbAdvertisement
     */
    public function setTbAvertissement($ip_tbAdvertisement) {
        $tbAvertissement = $ip_tbAdvertisement;
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
