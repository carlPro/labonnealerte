<?php

namespace labonnealerte\app;

require 'init.php';

use labonnealerte\classes\{Advertisement, Date, Page};
use labonnealerte\database\DatabaseConnect;
use labonnealerte\database\repository\{AdvertisementRepository, DateRepository, PageRepository};
use labonnealerte\scrapper\LbaScrapper;

$page = new LbaScrapper("https://www.leboncoin.fr/annonces/offres/bourgogne/");
var_dump($page->getContent());