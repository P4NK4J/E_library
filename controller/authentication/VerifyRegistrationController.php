<?php

$hash = $_GET['hash'];


$results = $app['database']->activateUser($hash);
var_dump($results);
die(); 
if (isset($results)) {

    header("location/verified");

    
} else {
    echo "Please verify your account";
}