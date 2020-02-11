<?php

$hash = $_GET['hash'];


$results = $app['database']->activateUser($hash);
if (isset($results)) {

    echo "<script>window.setTimeout(function() {
        alert('Account has been verified');
    window.location='/login';},0);</script>";
} else {
    echo "Please verify your account";
}