<?php

use App\Applecation;

require_once __DIR__.'/vendor/autoload.php';

$app = new Applecation(__DIR__);

$app->Router->get("/","home");

$app->run();
?>