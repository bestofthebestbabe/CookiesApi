<?php

DEFINE ('DB_HOSTNAME', 'localhost');
DEFINE ('DB_DATABASE', 'tutunova');
DEFINE ('DB_USERNAME', 'root');
DEFINE ('DB_PASSWORD', '');

$pdo = new PDO("mysql:DB_HOSTNAME;dbname=DB_DATABASE", DB_USERNAME, DB_PASSWORD);

if(!$pdo) die("Unable to connect to MySQL: " . mysqli_error($pdo));

?>