<!DOCTYPE html>
<html>
<head>
    <title>Palatschinken Rezept</title>
</head>
<body>

<?php
    // Kişi sayısını belirle (bunu URL'den de alabilirsin, örneğin ?portions=8)
    $portions = 6; // Burayı 4, 8 veya 12 yaparak test edebilirsin.

    // Orijinal tarif (6 kişi için)
    $originalPortions = 6;
    $ingredients = [
        "Mehl" => 250,
        "Eier" => 2,
        "Milch" => 0.5, // Yarım litre
        "Öl" => 1,
        "Salz" => 1,
        "Staubzucker" => 1,
        "Marmelade" => 4
    ];

    echo "<h2>Palatschinken-Rezept</h2>";
    echo "<p>Für $portions Personen benötigt man:</p>";
    echo "<ul>";

    // Malzemeleri ölçeklendir ve listele
    foreach ($ingredients as $ingredient => $amount) {
        $newAmount = ($amount / $originalPortions) * $portions;
        echo "<li>$newAmount $ingredient</li>";
    }

    echo "</ul>";
?>

</body>
</html>
