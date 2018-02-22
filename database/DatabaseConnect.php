<?php

namespace labonnealerte\database;

class DatabaseConnect {

  private static $dbh;

  /**
   * getConnection get Pdo connection
   * @return PDO
   */
  public static function getConnection() {
    if (is_null(self::$dbh)) {
      self::$dbh = new \PDO("mysql:host=" . __DB_ADRESS__ . ";dbname=" . __DB_NAME__, __DB_USER__, __DB_PASSWORD__);
    }
    return self::$dbh;
  }

}
