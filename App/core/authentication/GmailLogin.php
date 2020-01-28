<?php
require_once "gmailconfig.php";
 
if (isset($_GET['code']))
{   
   $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    
}

$oAuth = new Google_Service_Oauth2($gClient);
$userData = $oAuth->userinfo_v2_me->get();

$provider_email = "'".$userData->email."'";
$provider_id = "'".$userData->id."'";



$column = array('email','provider', 'provider_id');
$table = 'users';


$values = array('$provider_email','$provider_email', '$provider_id');
//var_dump($values);

$pdo =  new User(Connection::make($app['config']['database']));
$stmt = new QueryBuilder($pdo);
$stmt->insert($table, $column, $values);
var_dump($stmt);

?>