<?php

namespace labonnealerte\database\repository;

use labonnealerte\classes\Page;
use labonnealerte\classes\Date;
use labonnealerte\classes\Advertisement;

class PageRepository extends BaseRepository {

  /**
   * Create a page
   * @param  int $idUser
   * @param  int $page   
   */
  public function createPage($idUser, $page) {
    $sql_createPage = "" .
            " INSERT INTO Page(idUser, url)" .
            " VALUES(:idUserSql, :urlSql)";

    $param_createPage = array(
        ":idUserSql" => $idUser,
        ":urlSql" => $page->getUrl()
    );

    $reqPrepare = $this->dbh->prepare($sql_createPage);
    $reqPrepare->execute($param_createPage);
    foreach ($page->getTbAvertisement() as $advertisement) {
      $advertisementRepo = new AdvertisementRepository();
      $advertisementRepo->insertAdvertisement(
              $advertisement->getTitle(), $advertisement->getDate()->getHour(), $advertisement->getDate()->getMinute(), $idUser, $advertisement->getUrl()
      );
    }
  }

  /**
   * Return user page
   * @param  int $idUser 
   * @return Page
   */
  public function getPage($idUser) {
    $sql_getPage = "" .
            " SELECT Advertisement.title, Advertisement.hour, Advertisement.minute, Advertisement.url as urlAdvert, Page.url as urlPage" .
            " FROM Page" .
            " INNER JOIN Advertisement ON Page.idPage = Advertisement.idPage" .
            " WHERE Page.idUser=:idUserSql";

    $param_getPage = array(
        ":idUserSql" => $idUser
    );

    $reqPrepare = $this->dbh->prepare($sql_getPage);
    $reqPrepare->execute($param_getPage);
    $advertisementsBdd = $reqPrepare->fetchAll(\PDO::FETCH_OBJ);

    $page = new Page();
    $page->setUrl($advertisementsBdd[0]->urlPage);

    $advertisement = array();
    foreach ($advertisementsBdd as $advertisementBdd) {
      $date = new Date(
              $advertisementBdd->hour, $advertisementBdd->minute
      );
      $advertisement[] = new Advertisement(
              $date, $advertisementBdd->title, $advertisementBdd->urlAdvert
      );
    }

    $page->setTbAvertisement($advertisement);

    return $page;
  }

  /**
   * Supprime une page
   * @param  int $idUser
   */
  public function deletePage($idUser) {
    $sql_deletePage = "" .
            " DELETE FROM Page" .
            " WHERE idUser = :iduser";

    $param_deletePage = array(
        "iduser" => $idUser
    );

    $reqPrepare = $this->dbh->prepare($sql_deletePage);
    $reqPrepare->execute($param_deletePage);
  }

}
