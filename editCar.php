<?php require_once '../core/dbConfig.php'; ?>
<?php require_once '../core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Car</title>
</head>
<body>
    <h3>Are you sure you want to delete this car?</h3>
    <?php
        $car = getCarByID($pdo, $_GET['car_id']);
        if ($car) {
    ?>
        <p><strong>Make:</strong> <?php echo htmlspecialchars($car['Make']); ?></p>
        <p><strong>Model:</strong> <?php echo htmlspecialchars($car['Model']); ?></p>
        <p><strong>Year:</strong> <?php echo htmlspecialchars($car['Year']); ?></p>
        <p><strong>License Plate:</strong> <?php echo htmlspecialchars($car['LicensePlate']); ?></p>

        <form action="../core/handleForms.php?car_id=<?php echo $car['CarID']; ?>" method="POST">
            <input type="submit" name="deleteCarBtn" value="Yes, Delete">
            <a href="index.php">Cancel</a>
        </form>
    <?php
        } else {
            echo "<p>No car found.</p>";
        }
    ?>
</body>
</html>
