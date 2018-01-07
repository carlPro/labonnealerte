<?php

namespace labonnealerte\app;

class Autoloader 
{
    public static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));    
    }
    
    public static function autoload($class) {
        $parts = explode('\\', $class);
        require '../classes/' . end($parts) . '.php';
    }
} 
