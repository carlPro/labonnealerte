<?php

namespace labonnealerte\database\repository;

class AdvertisementRepository extends BaseRepository
{
   /**
    * Save one advert
    * @param  String $title  
    * @param  Int $hour   
    * @param  Int $minute 
    * @param  Int $idPage 
    */
   public function insertAdvertisement($title, $hour, $minute, $idPage) {
      $sql_createAdvertisement = "" .
         "INSERT INTO Advertisement(title, hour, minute, idPage) " .
         "SELECT :titleSql, :hourSql, :minuteSql, `idPage` " .
         "FROM Page " .
         "WHERE Page.idUser = :idUser";

      $param_createAdvertisement = array (
         ":titleSql" => $title,
         ":hourSql" => $hour,
         ":minuteSql" => $minute,
         ":idUser" => $idPage
      );

      $reqPrepare = $this->dbh->prepare($sql_createAdvertisement);
      $reqPrepare->execute($param_createAdvertisement);
   }
}