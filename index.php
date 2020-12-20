<?php

use App\Applecation;
use App\Controllers\home;
use App\Controllers\authController;

require_once __DIR__.'/vendor/autoload.php';

$app = new Applecation(__DIR__);

$app->Router->get("/",[home::class,'home']);
$app->Router->post("/",[home::class,'home']);
$app->Router->get("register",[authController::class,'register']);
$app->Router->post("register",[authController::class,'register']);

$app->run();
?>