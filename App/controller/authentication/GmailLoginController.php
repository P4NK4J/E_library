<?php


$data = Login::gAuth();

$entry = $app['database']->gLogin($data->name, $data->email);

require "views/authentication/login.view.php";