<?php


$data = Login::gAuth();

$entry = $app['database']->gLogin($data->name, $data->email);

