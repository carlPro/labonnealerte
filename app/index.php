<?php

namespace labonnealerte\app;

require 'init.php';

use labonnealerte\classes\{Advertisement, Date, Page};
use labonnealerte\database\DatabaseConnect;
use labonnealerte\database\repository\{AdvertisementRepository, DateRepository, PageRepository};
use labonnealerte\scrapper\LbaScrapper;

$scrapper = new LbaScrapper("https://www.leboncoin.fr/materiel_agricole/offres/bourgogne/?th=1");
echo var_dump($scrapper->getPage());
