index.php

<?php
session_start();
require_once 'dbConfig.php';
require_once 'models.php';

$cars = seeAllCars($pdo); // Fetch all cars
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Registration</title>
</head>
<body>
    <?php
    if (isset($_SESSION['success'])) {
        echo "<p style='color: green;'>" . $_SESSION['success'] . "</p>";
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    ?>

    <h1>Car Registration</h1>
    <form action="handleForms.php" method="POST">
        <input type="text" name="make" placeholder="Make" required>
        <input type="text" name="model" placeholder="Model" required>
        <input type="number" name="year" placeholder="Year" required>
        <input type="text" name="license_plate" placeholder="License Plate" required>
        <input type="submit" value="Add Car">
    </form>

    <h2>Registered Cars</h2>
    <table border="1">
        <tr>
            <th>Car ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>License Plate</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($cars as $car): ?>
        <tr id="car_<?php echo $car['car_id']; ?>">
            <td><?php echo $car['car_id']; ?></td>
            <td><?php echo $car['make']; ?></td>
            <td><?php echo $car['model']; ?></td>
            <td><?php echo $car['year']; ?></td>
            <td><?php echo $car['license_plate']; ?></td>
            <td>
                <a href="editCar.php?car_id=<?php echo $car['car_id']; ?>">Edit</a>
                <a href="confirmDelete.php?car_id=<?php echo $car['car_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
