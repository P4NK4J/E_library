<?php


$data = Login::gAuth();
var_dump($data);
die();
$entry = $app['database']->gLogin($data->name, $data->email);

