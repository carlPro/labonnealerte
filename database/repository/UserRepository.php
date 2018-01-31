<?php

namespace labonnealerte\database\repository;

class UserRepository extends BaseRepository
{
   /**
    * Return is User got a page in database
    * @param  int  $idUser
    * @return boolean
    */
   public function isUserGotPage($idUser) {
      $sql_isUserGotPage = "" .
         "SELECT COUNT(*) as isUserGotPage " .
         "FROM Page INNER JOIN Advertisement ON  Page.idPage = Advertisement.idPage " .
         "WHERE idUser = :idUserSql";

      $param_isUserGotPage = array (
         ":idUserSql" => $idUser
      );

      $reqPrepare = $this->dbh->prepare($sql_isUserGotPage);
      $reqPrepare->execute($param_isUserGotPage);

      return $reqPrepare->fetch(\PDO::FETCH_OBJ)->isUserGotPage == 0 ? false : true;
   }
}