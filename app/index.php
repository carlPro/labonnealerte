<?php

namespace labonnealerte\app;

require 'init.php';

use labonnealerte\classes\{Advertisement, Date, Page};
use labonnealerte\database\DatabaseConnect;
use labonnealerte\database\repository\{AdvertisementRepository, DateRepository, PageRepository};
use labonnealerte\scrapper\LbaScrapper;

$page = new LbaScrapper("http://php.net/manual/fr/language.oop5.decon.php");
echo $page->getContent();