<?php

// Parent path directory "labonnealerte", in linux : /var/www/html/
define("__ROOT_PATH__", dirname(dirname(dirname(__FILE__))) . "/");
define("__LBA__", "labonnealerte/");
define("__LBA_AUTOLOAD_DIR__", "autoload/");
define("__LBA_DATABASE_DIR__", "database/");
define("__LBA_AUTOLOAD__", __ROOT_PATH__ . __LBA__ . __LBA_AUTOLOAD_DIR__);
define("__LBA_DATABASE__", __ROOT_PATH__ . __LBA__ . __LBA_DATABASE_DIR__);
