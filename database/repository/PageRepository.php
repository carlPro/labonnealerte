<?php

namespace labonnealerte\database\repository;

use labonnealerte\classes\Page;
use labonnealerte\classes\Date;
use labonnealerte\classes\Advertisement;

class PageRepository extends BaseRepository
{
   /**
    * createPage
    * @param  int $idUser
    * @param  int $page   
    */
   public function createPage($idUser, $page) {
      $sql_createPage = "" .
         "INSERT INTO Page(idUser, url) " .
         "VALUES(:idUserSql, :urlSql)";

      $param_createPage = array (
         ":idUserSql" => $idUser,
         ":urlSql" => $page->getUrl()
      );

      $reqPrepare = $this->dbh->prepare($sql_createPage);
      $reqPrepare->execute($param_createPage);

      foreach ($page->getTbAvertisement() as $advertisement) {

         $advertisementRepo = new AdvertisementRepository();
         $advertisementRepo->insertAdvertisement(
            $advertisement->getTitle(),
            $advertisement->getDate()->getHour(),
            $advertisement->getDate()->getMinute(),
            $idUser
         );
      }
   }

   public function getPage($idUser) {
      $sql_getPage = "" .
         "SELECT * " .
         "FROM Page " . 
         "INNER JOIN Advertisement ON Page.idPage = Advertisement.idPage " .
         "WHERE Page.idUser=:idUserSql";

      $param_getPage = array (
         ":idUserSql" => $idUser
      );

      $reqPrepare = $this->dbh->prepare($sql_getPage);
      $reqPrepare->execute($param_getPage);
      $res_getPage = $reqPrepare->fetchAll(\PDO::FETCH_OBJ);

      $page = new Page();
      $page->setUrl($res_getPage[0]->url);

      $advertisement = array();
      foreach ($res_getPage as $advertisementBdd) {
         $date = new Date(
            $advertisementBdd->hour,
            $advertisementBdd->minute
         );
         $advertisement[] = new Advertisement(
            $date,
            $advertisementBdd->title
         );
      }

      $page->setTbAvertisement($advertisement);

      return $page;
   }
}