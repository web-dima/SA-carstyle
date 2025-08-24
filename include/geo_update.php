<?php

require_once __DIR__.'/../vendor/autoload.php';

use Cimus\IpGeoBase\Util\IpGeoBaseUtil;

$path = __DIR__ . '/../geodb';
$util = new IpGeoBaseUtil();
$util->loadArchive($path);
$util->convertInBinary($path);