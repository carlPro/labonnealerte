<?php

namespace labonnealerte\app;

require 'init.php';

use labonnealerte\classes\{Advertisement, Date, Page};
use labonnealerte\database\DatabaseConnect;
use labonnealerte\database\repository\{AdvertisementRepository, PageRepository, UserRepository};
use labonnealerte\scrapper\LbaScrapper;

$idUser = 1; // Todo last change this for retrieved POST data
$url = "https://www.leboncoin.fr/materiel_agricole/offres/bourgogne/?th=1";

$scrapper = new LbaScrapper($url);

$page = $scrapper->getPage();
$userRepository = new UserRepository();
$pageRepository = new PageRepository();

if ($userRepository->isUserGotPage($idUser)) {
   
} else {
   $pageRepository->createPage($idUser, $page);
}