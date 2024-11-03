<?php  
$host = "localhost"; 
$user = "root";       
$password = "";       
$dbname = "car"; 


$dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";

try {

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); 
}
?>
