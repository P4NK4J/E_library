<?php


$data = Login::GAuth();

$entry = $app['database']->GLogin($data->name, $data->email);

require "views/authentication/login.view.php";