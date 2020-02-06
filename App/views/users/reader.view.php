<?php
session_start();
if($_SESSION['user_type'] != 'reader')
{
header("location:/");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    
    <title>Reader Dashboard</title>
</head>
<body>
<?php require "views/users/navbar.reader.view.php";
require "views/users/dashboard.view.php";
?>
    
</body>
</html>
