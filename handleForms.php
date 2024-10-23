<?php
require_once 'dbConfig.php';
require_once 'models.php';

$error = '';
$successMessage = '';


if (isset($_POST['insertNewCarBtn'])) {
    $make = trim($_POST['make']);
    $model = trim($_POST['model']);
    $year = trim($_POST['year']);
    $license_plate = trim($_POST['license_plate']);

    if (!empty($make) && !empty($model) && !empty($year) && !empty($license_plate)) {
        $query = insertIntoCarRecords($pdo, $make, $model, $year, $license_plate);
       
        if ($query) {
            $successMessage = "Car registered successfully!";
        } else {
            $error = "Insertion failed";
        }
    } else {
        $error = "Make sure that no fields are empty";
    }
}


if (isset($_POST['editCarBtn'])) {
    $car_id = $_GET['car_id'];
    $make = trim($_POST['make']);
    $model = trim($_POST['model']);
    $year = trim($_POST['year']);
    $license_plate = trim($_POST['license_plate']);

    if (!empty($car_id) && !empty($make) && !empty($model) && !empty($year) && !empty($license_plate)) {
        $query = updateCar($pdo, $car_id, $make, $model, $year, $license_plate);
       
        if ($query) {
            $successMessage = "Car updated successfully!";
            header("Location: ../sql/index.php"); 
            exit();
        } else {
            $error = "Update failed";
        }
       
    } else {
        $error = "Make sure that no fields are empty";
    }
}

// Handle car deletion
if (isset($_POST['deleteCarBtn'])) {
    $query = deleteCar($pdo, $_GET['car_id']);
    if ($query) {
        $successMessage = "Car deleted successfully!";
        header("Location: ../sql/index.php"); 
        exit();
    } else {
        $error = "Deletion failed";
    }
}


$cars = seeAllCarRecords($pdo);
?>

