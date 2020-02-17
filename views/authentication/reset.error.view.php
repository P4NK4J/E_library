<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($_SESSION['user_type'] === 'reader') {
        header("location: /reader");
        exit;
    } elseif ($_SESSION['user_type'] === 'admin') {
        header("location: /admin");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="Resources/CSS/reseterror.css" />
</head>
<body>
    
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>Oops!</h1>
            </div>
            <h2>404 - Account not found</h2>
            <p>The Email address you entered seems unregistered.</p>
            <a href="/">Go To Homepage</a>
        </div>
    </div>
</body>
</html>