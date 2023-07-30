<?php

use MVC\core\App;

define("DS",DIRECTORY_SEPARATOR);
define("ROOT",dirname(__DIR__));
define("APP",ROOT.DS.'app');
define("VENDOR",ROOT.DS.'vendor');
define("CONTROLERS",APP.DS.'controlers');
define("CORE",APP.DS.'core');
define("MODELS",APP.DS.'models');
define("VIEWS",APP.DS.'views');

require_once VENDOR.DS.'autoload.php';

$objApp=new App();
?>