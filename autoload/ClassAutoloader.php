<?php

namespace labonnealerte\app;

class ClassAutoloader 
{
   public static function register() {
      spl_autoload_register(array(__CLASS__, 'autoload'));    
   }

   public static function autoload($namespace) {
      $class = self::getClass($namespace);
      $relativePath = self::convertToPath($namespace);
      require __ROOT_PATH__ . $relativePath . '.php';
   }

   private static function getClass($namespace) {
      $parts = explode('\\', $namespace);
      return end($parts);
   }

   private static function convertToPath($namespace) {
      return str_replace('\\', '/', $namespace);
   }
} 
