<?php

namespace labonnealerte\app;

require 'init.php';

use labonnealerte\classes\{Advertisement, Date, Page};
use labonnealerte\database\repository\{AdvertisementRepository, PageRepository, UserRepository};
use labonnealerte\scrapper\LbaScrapper;

$idUser = 1; // Todo last change this for retrieved POST data
$url = "https://www.leboncoin.fr/materiel_agricole/offres/bourgogne/?th=1&q=moto";

$scrapper = new LbaScrapper($url);

$userRepository = new UserRepository();
$pageRepository = new PageRepository();

if ($userRepository->isUserGotPage($idUser)) {
   $pageBdd = $pageRepository->getPage($idUser);
   $pageInternet = $scrapper->getPage();
   if(Page::isSame($pageInternet, $pageBdd) == false) {
      $newAdverts = getNewAverts();
      // todo envoie de mail
      // todo enregistrement bdd
   }
} else {
   $pageRepository->createPage($idUser, $page);
}

// todo
function getNewAverts() {

}