<?php

namespace labonnealerte\database\repository;

use labonnealerte\database\DatabaseConnect;

class PageRepository extends BaseRepository
{
   private $dbh;

   public function __construct() {
      $this->dbh = DatabaseConnect::getConnection();
   }
   
}