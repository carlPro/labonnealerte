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

require dirname(dirname(__FILE__)) . "/autoload/Path.php";
require __LBA_AUTOLOAD__ . "ClassAutoloader.php";
require __LBA_DATABASE__ . "Config.php";

ClassAutoloader::register();