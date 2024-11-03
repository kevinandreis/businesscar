<?php
session_start();
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];
    $car = getCarById($pdo, $car_id);
} else {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        if (deleteCar($pdo, $car_id)) {
            $_SESSION['success'] = "Car deleted successfully.";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error'] = "Failed to delete car.";
        }
    } else {
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Deletion</title>
</head>
<body>
    <h1>Confirm Deletion</h1>
    <p>Are you sure you want to delete the following car?</p>
    <p><strong>Make:</strong> <?php echo $car['make']; ?></p>
    <p><strong>Model:</strong> <?php echo $car['model']; ?></p>
    <p><strong>Year:</strong> <?php echo $car['year']; ?></p>
    <p><strong>License Plate:</strong> <?php echo $car['license_plate']; ?></p>
    
    <form action="confirmDelete.php?car_id=<?php echo $car_id; ?>" method="POST">
        <button type="submit" name="confirm" value="yes">Yes, Delete</button>
        <button type="submit" name="confirm" value="no">No, Go Back</button>
    </form>
</body>
</html>
