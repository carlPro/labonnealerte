<?php

namespace labonnealerte\database\repository;

use labonnealerte\database\DatabaseConnect;

class BaseRepository
{
   public $dbh;

   /**
    * Construct database object
    */
   public function __construct() {
      $this->dbh = DatabaseConnect::getConnection();
   }
}