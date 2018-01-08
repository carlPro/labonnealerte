<?php

namespace labonnealerte\app;

class Autoloader 
{
    public static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));    
    }
    
    public static function autoload($path) {
        $parts = explode('\\', $path);
        $className = end($parts);
        require __LBA_CLASSES__ . $className . '.php';
    }
} 
