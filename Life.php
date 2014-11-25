<?php
define('DS', DIRECTORY_SEPARATOR);
set_time_limit(10);

require_once('classes/Loader.php');
spl_autoload_register('Loader::load');
$config = new Service\Config(__DIR__ . DS  . "life.cfg");
//echo $config->getPlainText();die;
$service = new Service\Accessor($config);

$interaction = new Interaction(Service\Accessor::getSpace(), Service\Accessor::getCellsPool());
$interaction->begin();

////$interaction = new Interaction($space, $cellPool);
$service->save();

echo "\n";