<?php

namespace labonnealerte\classes;

use labonnealerte\classes\{Advertisement, Date};

class Page 
{
    private $tbAvertisement;
    private $url;

    /** 
     * setTbAdvertisement
     * @param array $ip_tbAdvertisement
     */
    public function setTbAvertisement($ip_tbAdvertisement) {
        $this->tbAvertisement = $ip_tbAdvertisement;
    }

    public function getTbAvertisement() {
        return $this->tbAvertisement;
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

    public static function isSame($pageBdd, $pageInternet) {
        if ($pageBdd->getUrl() != $pageInternet->getUrl()) {
            return false;
        }

        $pageBddAvertisement = $pageBdd->getTbAvertisement();
        $pageInternetAvertisement = $pageInternet->getTbAvertisement();

        foreach ($pageBddAvertisement as $key => $avertisementBdd) {
            if ($avertisementBdd->getUrl() != $pageInternetAvertisement[$key]->getUrl()) {
                return false;
            }
        }

        return true;
    }
}
