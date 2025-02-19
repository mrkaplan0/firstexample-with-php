<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalorie</title>
    <style>
        h1 {
            text-align: center;
            
        }
    </style>
</head>
<body>
    <?php
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $calorie = 0;
    if ($gender == "female") {
        $calorie = 655 + (9.6 * $weight) + (1.8 * $height) - (4.7 * $age);
    } else {
        $calorie = 66 + (13.7 * $weight) + (5 * $height) - (6.8 * $age);
    }
    echo "<h1>Die Kalorien, die du täglich brauchst, sind: $calorie</h1>";
    ?>
</body>
</html>