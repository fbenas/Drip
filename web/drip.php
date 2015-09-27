<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use DripWeb\DripWeb;

$dripWeb = new DripWeb($_GET, $_POST);
$dripWeb->init();