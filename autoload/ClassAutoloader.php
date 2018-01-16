<?php

namespace labonnealerte\app;

class ClassAutoloader 
{
   /**
    * register add autoload to lba project
    * @return [type] [description]
    */
   public static function register() {
      spl_autoload_register(array(__CLASS__, 'autoload'));    
   }

   /**
    * autoload
    * @param  string $namespace
    */
   public static function autoload($namespace) {
      $class = self::getClass($namespace);
      $relativePath = self::convertToPath($namespace);
      require __ROOT_PATH__ . $relativePath . '.php';
   }

   /**
    * getClass get the class of a namespace
    * @param  string $namespace
    * @return string $class
    */
   private static function getClass($namespace) {
      $parts = explode('\\', $namespace);
      return end($parts);
   }

   /**
    * convertToPath change \ to /
    * @param  string $namespace
    * @return string
    */
   private static function convertToPath($namespace) {
      return str_replace('\\', '/', $namespace);
   }
} 
