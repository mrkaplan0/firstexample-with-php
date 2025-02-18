<?php
$red =155;
$green = 155;
$blue = 155;

if (isset($_GET["red"])) {
    $red = $_GET["red"];
}
if (isset($_GET["green"])) {
    $green = $_GET["green"];
}           
if (isset($_GET["blue"])) {
    $blue = $_GET["blue"];
}
$bgColor = "rgb($red,$green,$blue)"; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palatschinken Rezept</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: <?php echo $bgColor; ?>;
           
        }
    </style>
</head>

<body>
    <header>
        <h1>Palatschinken Rezept</h1>
    </header>
    <main>
        <div class="change-color">
            <form action="" method="get">
                <label for="bgColor">Hintergrundfarbe: </label>
                <input type="number" min="0" max="255" id="red" name="red" value="<?php echo $red; ?>" required />
                <input type="number" min="0" max="255" id="green" name="green" value="<?php echo $green; ?>" required />
                <input type="number" min="0" max="255" id="blue" name="blue" value="<?php echo $blue; ?>" required />

                <button type="submit">Farben ändern</button>
            </form>
        </div>
        <div class="rezept">
            <form action="" method="get">
                <div>
                    <label for="personen">Personenzahl: </label>
                    <input type="number" id="personen" name="personen" />
                </div>
                <button type="submit" onclick="<?php $bgColor = '#000000'; ?>">Berechnen</button>
            </form>


            <?php

            $portion = 6;
            $person_count = isset($_GET["personen"]) ? intval($_GET["personen"]) : 6;
            $zutaten = [
                ["menge" => 250, "einheit" => "g", "art" => "Mehl"],
                ["menge" => 2, "einheit" => "St", "art" => "Eier"],
                ["menge" => 0.5, "einheit" => "L", "art" => "Milch"],
                ["menge" => 1, "einheit" => "Prise", "art" => "Salz"],
                ["menge" => 1, "einheit" => "Schuss", "art" => "Öl"],
                ["menge" => 1, "einheit" => "EL", "art" => "Staubzucker"],
                ["menge" => 4, "einheit" => "EL", "art" => "Marmelade"]

            ];

            echo "<table>
        <caption><span>Palatschinken</span> <br>
        Zutaten für $person_count Personen
        </caption>";
            echo  "<thead>
            
            <th>Menge</th>
            <th>Einheiten</th>
            <th>Art</th>
        </thead>";
            echo "<tbody>";
            foreach ($zutaten as $zutat) {
                echo "<tr>";
                echo "<td>" . $zutat["menge"] / $portion * $person_count . "</td>";
                echo "<td>" . $zutat["einheit"] . "</td>";
                echo "<td>" . $zutat["art"] . "</td>";
                echo "</tr>";
            }
            echo "

        </tbody>
       
    </table>";
            ?>
        </div>
<div class="berechnung">
    <form action="" method="get">
        <div>
            <label for="M">Gesamtjahresbedarf (M): </label>
            <input type="number" id="M" name="M" />
        </div>
        <div>
            <label for="p">Einstandspreis pro Einheit (p): </label>
            <input type="number" id="p" name="p" />
        </div>
        <div>
            <label for="a">Bestellfixe Kosten (a): </label>
            <input type="number" id="a" name="a" />
        </div>
        <div>
            <label for="q">Zins- und Lagerkosten pro Jahr in % (q): </label>
            <input type="number" id="q" name="q" />
        </div>
        <button type="submit">Berechnen</button>
<?php
    
    $M = isset($_GET['M']) ? intval($_GET['M']) : 0;  // Gesamtjahresbedarf
    $p = isset($_GET['p']) ? intval($_GET['p']) : 31;     // Einstandspreis pro Einheit
    $a = isset($_GET['a']) ? intval($_GET['a']) : 50;     // Bestellfixe Kosten
    $q = isset($_GET['q']) ? intval($_GET['q']) : 14;     // Zins- und Lagerkosten pro Jahr in %

    // EOQ formülü
    $x_opt = sqrt((200 * $M * $a) / ($p * $q));

    echo "<h2>Optimale Bestellmenge</h2>";
    echo "<p>Die optimale Bestellmenge beträgt: <strong>" . round($x_opt) . "</strong></p>";
?>

</div>
    </main>
</body>

</html>