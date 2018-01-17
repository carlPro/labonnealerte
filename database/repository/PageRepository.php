<?php

namespace labonnealerte\database\repository;

class PageRepository extends BaseRepository
{
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

      foreach ($page->getTbAvertissement() as $advertisement) {
         $sql_createAdvertisement = "" .
            "INSERT INTO Advertisement(title, hour, minute, idPage) " .
            "SELECT :titleSql, :hourSql, :minuteSql, `idPage` " .
            "FROM Page " .
            "WHERE Page.idUser = :idUser";

            error_log($sql_createAdvertisement);


         $param_createAdvertisement = array (
            ":titleSql" => $advertisement->getTitle(),
            ":hourSql" => $advertisement->getHour()->getHour(), // todo
            ":minuteSql" => $advertisement->getHour()->getMinute(),
            ":idUser" => $idUser
         );
                     error_log($advertisement->getTitle());
            error_log($advertisement->getHour()->getHour());
            error_log($advertisement->getHour()->getMinute());
            error_log($idUser);

         $reqPrepare = $this->dbh->prepare($sql_createAdvertisement);
         $reqPrepare->execute($param_createAdvertisement);
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
      $res_getPage = $reqPrepare->fetch(\PDO::FETCH_OBJ);

      foreach ($res_getPage as $advertisement) {

      }



   }
}