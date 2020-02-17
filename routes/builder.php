<?php


$app['config'] = require 'config.php';


$app['database'] = new User(Connection::make($app['config']['database']));

$app['database_book'] = new Book(Connection::make($app['config']['database']));

$app['categories'] = new Categories(Connection::make($app['config']['database']));


