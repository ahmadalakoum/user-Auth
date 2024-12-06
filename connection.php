<?php

$server="localhost";
$username="root";
$password="ahmadalakoum000";
$db="simpleproject";

//PDO
try{
$pdo = new PDO("mysql:host=$server;dbname=$db", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
echo "Connection failed: ". $e->getMessage();
}
