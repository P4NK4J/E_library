<?php

$hash = $_GET['hash'];


$results = $app['database']->activateUser($hash);
 
if (isset($results)) {

    header("location:/verified");
   
} else {
    echo "Please verify your account";
}