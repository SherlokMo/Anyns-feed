<?php

use App\Applecation;
use App\Controllers\home;

require_once __DIR__.'/vendor/autoload.php';

$app = new Applecation(__DIR__);

$app->Router->get("/",[home::class,'home']);
$app->Router->post("/",[home::class,'home']);

$app->Router->post("login",function(){
    return "I AM HANDLING!";
});

$app->run();
?>