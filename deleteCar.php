<?php
session_start();
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];
    if (deleteCar($pdo, $car_id)) {
        $_SESSION['success'] = "Car deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete car.";
    }
} else {
    $_SESSION['error'] = "Car ID not found.";
}

header("Location: index.php");
exit();
