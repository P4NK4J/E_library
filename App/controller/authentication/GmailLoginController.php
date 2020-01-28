<?php

$data = Login::GAuth();

$app['database']->GLogin($data->name,$data->email);

