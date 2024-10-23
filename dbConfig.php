dbConfig.php

<?php  
$host = "localhost";
$user = "root";
$password = "";
$dbname = "SALAZAR";
$dsn = "mysql:host={$host};dbname={$dbname}";
$pdo = new PDO($dsn, $user, $password);
?>
