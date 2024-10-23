<?php
require_once 'dbConfig.php';

function insertIntoCarRecords($pdo, $make, $model, $year, $license_plate) {
    $sql = "INSERT INTO Cars (Make, Model, Year, LicensePlate) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$make, $model, $year, $license_plate]);
}

function seeAllCarRecords($pdo) {
    $sql = "SELECT * FROM Cars";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getCarByID($pdo, $car_id) {
    $sql = "SELECT * FROM Cars WHERE CarID = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$car_id]) ? $stmt->fetch() : null;
}

function updateCar($pdo, $car_id, $make, $model, $year, $license_plate) {
    $sql = "UPDATE Cars SET Make = ?, Model = ?, Year = ?, LicensePlate = ? WHERE CarID = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$make, $model, $year, $license_plate, $car_id]);
}

function deleteCar($pdo, $car_id) {
    $sql = "DELETE FROM Cars WHERE CarID = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$car_id]);
}

// Functions for services management
function insertService($pdo, $car_id, $service_type, $service_date, $service_cost) {
    $sql = "INSERT INTO Services (CarID, ServiceType, ServiceDate, ServiceCost) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$car_id, $service_type, $service_date, $service_cost]);
}

function seeAllServicesForCar($pdo, $car_id) {
    $sql = "SELECT * FROM Services WHERE CarID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$car_id]);
    return $stmt->fetchAll();
}
