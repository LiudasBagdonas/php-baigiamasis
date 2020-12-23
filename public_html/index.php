<?php
date_default_timezone_set ("Europe/Vilnius");
use App\App;

require '../bootloader.php';

$app = new App();
$app->run();