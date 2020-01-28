<?php


require "vendor/autoload.php";
require 'routes/builder.php';



$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
require Router::load('routes.php')
                
                ->direct($uri);


