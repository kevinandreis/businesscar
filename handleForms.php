<?php
session_start();
require_once 'dbConfig.php';
require_once 'models.php';

$error = '';
$successMessage = '';


if (isset($_POST['make']) && !isset($_POST['car_id'])) {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $license_plate = $_POST['license_plate'];

    if (addCar($pdo, $make, $model, $year, $license_plate)) {
        $_SESSION['success'] = "Car successfully added.";
        header("Location: index.php"); 
        exit();
    } else {
        $_SESSION['error'] = "Failed to add car.";
        header("Location: index.php");
        exit();
    }
}


if (isset($_POST['car_id'])) {
}


if (isset($_GET['car_id'])) {
}
