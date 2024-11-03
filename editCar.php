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
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $license_plate = $_POST['license_plate'];

    if (updateCar($pdo, $car_id, $make, $model, $year, $license_plate)) {
        $_SESSION['success'] = "Car updated successfully.";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Failed to update car.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Car</title>
</head>
<body>
    <h1>Edit Car</h1>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    ?>
    <form action="editCar.php?car_id=<?php echo $car_id; ?>" method="POST">
        <input type="text" name="make" value="<?php echo $car['make']; ?>" required>
        <input type="text" name="model" value="<?php echo $car['model']; ?>" required>
        <input type="number" name="year" value="<?php echo $car['year']; ?>" required>
        <input type="text" name="license_plate" value="<?php echo $car['license_plate']; ?>" required>
        <input type="submit" value="Update">
    </form>
</body>
</html>
