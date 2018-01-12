<?php

namespace labonnealerte\app;

/**
 * Initialization of the scrapping
 * 
 * Init :
 *    - Constant path
 *    - Autoloader
 *    - Constant database
 */

require "/var/www/html/labonnealerte/autoload/Path.php";
require __LBA_AUTOLOAD__ . "Autoloader.php";
require __LBA_DATABASE__ . "Config.php";

Autoloader::register();