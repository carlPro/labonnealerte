<?php

namespace labonnealerte\app;

require 'init.php';

use labonnealerte\classes\{Advertisement, Date, Page};
use labonnealerte\database\DatabaseConnect;
use labonnealerte\database\repository\{AdvertisementRepository, PageRepository, UserRepository};
use labonnealerte\scrapper\LbaScrapper;

$idUser = 1; // Todo last change this for retrieved POST data
//$scrapper = new LbaScrapper("https://www.leboncoin.fr/materiel_agricole/offres/bourgogne/?th=1");

$repo = new UserRepository();

var_dump($repo->isUserGotPage($idUser));
