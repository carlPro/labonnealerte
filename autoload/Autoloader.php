<?php

namespace labonnealerte\app;

class Autoloader 
{
   public static function register() {
      spl_autoload_register(array(__CLASS__, 'autoload'));    
   }

   public static function autoload($namespace) {
      error_log($namespace);
      $class = Autoloader::getClass($namespace);
      require __LBA_CLASSES__ . $class . '.php';
   }

   private static function getClass($namespace) {
      $parts = explode('\\', $namespace);
      return end($parts);
   }
} 
