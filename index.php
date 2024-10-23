<?php require_once '../core/dbConfig.php'; ?>
<?php require_once '../core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
</head>
<body>
    <h3>Edit Car Information</h3>
    <?php $car = getCarByID($pdo, $_GET['car_id']); ?>
    <form action="../core/handleForms.php?car_id=<?php echo $car['CarID']; ?>" method="POST">
        <p><label for="make">Make</label> <input type="text" name="make" value="<?php echo htmlspecialchars($car['Make']); ?>"></p>
        <p><label for="model">Model</label> <input type="text" name="model" value="<?php echo htmlspecialchars($car['Model']); ?>"></p>
        <p><label for="year">Year</label> <input type="number" name="year" value="<?php echo htmlspecialchars($car['Year']); ?>"></p>
        <p><label for="license_plate">License Plate</label> <input type="text" name="license_plate" value="<?php echo htmlspecialchars($car['LicensePlate']); ?>"></p>
        <input type="submit" name="editCarBtn" value="Update">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
