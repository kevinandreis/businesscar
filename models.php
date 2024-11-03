<?php

function seeAllCars($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM car");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addCar($pdo, $make, $model, $year, $license_plate) {
    $stmt = $pdo->prepare("INSERT INTO car (make, model, year, license_plate) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$make, $model, $year, $license_plate]);
}


function getCarById($pdo, $car_id) {
    $stmt = $pdo->prepare("SELECT * FROM car WHERE car_id = ?");
    $stmt->execute([$car_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deleteCar($pdo, $car_id) {
    $stmt = $pdo->prepare("DELETE FROM car WHERE car_id = ?");
    return $stmt->execute([$car_id]);
}

function updateCar($pdo, $car_id, $make, $model, $year, $license_plate) {
    $stmt = $pdo->prepare("UPDATE car SET make = ?, model = ?, year = ?, license_plate = ? WHERE car_id = ?");
    return $stmt->execute([$make, $model, $year, $license_plate, $car_id]);
}

?>
