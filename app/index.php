<?php

namespace labonnealerte\app;

require 'init.php';

use labonnealerte\classes\{Advertisement, Date, Page};
use labonnealerte\database\repository\{AdvertisementRepository, PageRepository, UserRepository};
use labonnealerte\scrapper\LbaScrapper;

$idUser = 1; // Todo last change this for retrieved POST data
$url = "https://www.leboncoin.fr/_vehicules_/offres/?th=1&q=moto";

$scrapper = new LbaScrapper($url);

$userRepository = new UserRepository();
$pageRepository = new PageRepository();

$pageInternet = $scrapper->getPage();

if ($userRepository->isUserGotPage($idUser)) {
   $pageBdd = $pageRepository->getPage($idUser);
   
   if(Page::isSame($pageInternet, $pageBdd) == false) {
      $newAdverts = getNewAverts();

      // todo envoie de mail

      $pageRepository->deletePage($idUser);
      $pageRepository->createPage($idUser, $pageInternet);
   }
} else {
   $pageRepository->createPage($idUser, $pageInternet);
}

/** 
 * Return new advert
 * @return Advertisement[]
 */
function getNewAverts() {
   global $pageBdd;
   global $pageInternet;

   $newAdverts = array();
   $tbAvertBdd = $pageBdd->getTbAvertisement();
   $tbAdvertInternet = $pageInternet->getTbAvertisement();
   foreach ($tbAdvertInternet as $internetAdvert) {
      if (!in_array($internetAdvert, $tbAvertBdd)) {
         $newAdverts[] = $internetAdvert;
      }
   }
   return $newAdverts;
}