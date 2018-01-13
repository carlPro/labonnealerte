<?php

namespace labonnealerte\database\repository;

use labonnealerte\database\DatabaseConnect;

class PageRepository
{
   private $dbh;

   public function __construct() {
      $this->dbh = DatabaseConnect::getConnection();
   }
   
}