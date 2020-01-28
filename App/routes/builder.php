<?php


$app['config'] = require 'config.php';



$app['database'] =  new User(Connection::make($app['config']['database']));




