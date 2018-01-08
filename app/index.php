<?php

namespace labonnealerte\app;

use labonnealerte\classes\Page;
use labonnealerte\classes\Advertisement;

require "/var/www/html/labonnealerte/autoload/path.php";
require __LBA_AUTOLOAD__ . "Autoloader.php";

Autoloader::register();

$test = new Page();
echo $test->test();
