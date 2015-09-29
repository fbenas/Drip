<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use DripWeb\DripWeb;
use DripWeb\User;
use PhilDb\PhilDb;
use PhilDb\PhilDbConfig;
PhilDb
$user = new User();
var_dump($user->getJson());die();

//$dripWeb = new DripWeb($_GET, $_POST);
//$dripWeb->init();