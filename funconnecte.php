<?php
include_once('define.php');
function connxion($base){
$host = HOST;
$user= USER;
try{
    $dns = new PDO("mysql:host=$host;dbname=$base",$user,'');
}catch(PDOException $e)
{
    $e->getMessage();
}
return $dns;
}
?>