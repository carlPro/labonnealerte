<?php

namespace labonnealerte\database\repository;

use labonnealerte\database\DatabaseConnect;

class BaseRepository
{
   public $dbh;

   public function __construct() {
      $this->dbh = DatabaseConnect::getConnection();
   }
}