<?php


$app['config'] = require 'config.php';

require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';
require 'core/authentication/Login.php';
require 'core/database/User.php';

require 'routes/Router.php';

$app['database'] =  new User(Connection::make($app['config']['database']));




