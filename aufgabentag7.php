<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aufgaben</title>
    <link rel="stylesheet" href="aufgabentag7-style.css">
</head>

<body>
    <header>
        <h1>Aufgaben 7</h1>
    </header>

    <main>
        <div class="zufallzahl">
            <h2>Zufallszahl</h2>
            <br>
            <?php
            $zahl = rand(1, 100);

            echo "<p>Die Zufallszahl lautet: $zahl</p>";
            if ($zahl % 2 == 0) {
                echo "<p>Die Zahl ist <b>gerade.</b></p>";
            } else {
                echo "<p>Die Zahl ist <b>ungerade.</b></p>";
            }


            ?></p>
        </div>
        <div class="woche">
            <h2>Wochentag</h2>
            <?php
            $wochentag = date("l");
            echo "<br>";
            switch ($wochentag) {
                case "Monday":
                    echo "<p>Heute ist Montag. Arbeit bzw. Schule</p>";
                    break;
                case "Tuesday":
                    echo "<p>Heute ist Dienstag. Arbeit bzw. Schule </p>";
                    break;
                case "Wednesday":
                    echo "<p>Heute ist Mittwoch. Arbeit bzw. Schule</p>";
                    break;
                case "Thursday":
                    echo "<p>Heute ist Donnerstag. Arbeit bzw. Schule</p>";
                    break;
                case "Friday":
                    echo "<p>Heute ist Freitag. Arbeit bzw. Schule</p>";
                    break;
                case "Saturday":
                    echo "<p>Heute ist Wochenende. Yupiiii :)</p>";
                    break;
                case "Sunday":
                    echo "<p>Heute ist Wochenende. Yupiiii :)</p>";
                    break;
            }
            ?>
        </div>

        <div class="wuerfel">
            <h2>6 Würfeln</h2>
            <br>
            <?php
            $counter = 1;
            while (true) {
                $wuerfel = rand(1, 6);
                // echo "<p>Die gewürfelte Zahl  $counter: $wuerfel</p>";
                if ($wuerfel == 6) {
                    echo "<p>Super. Du hast $counter Versuche gebraucht.</p>";
                    break;
                }
                $counter++;
            }

            ?>
        </div>
        <div class="generate-password">
            <h2>Passwort generieren</h2>
            <br>
            <?php
            $password = "";
            $length = 8;
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $charsLength = strlen($chars);
            for ($i = 0; $i < $length; $i++) {
                $password .= $chars[rand(0, $charsLength - 1)];
            }
            echo "<p>Das generierte Passwort lautet: $password</p>";
            ?>
        </div>
        <div class="monat">
            <h2>Monat</h2>
            <br>
            <?php
            $monat = date("m");
            $jahrzeit = "";
            $monatName = "";
            switch ($monat) {
                case "12":
                    $monatName = "Dezember";
                    $jahrzeit = "Winter";
                    break;
                case "01":
                    $monatName = "Januar";
                    $jahrzeit = "Winter";
                    break;
                case "02":
                    $monatName = "Februar";
                    $jahrzeit = "Winter";
                    break;
                case "03":
                    $monatName = "März";
                    $jahrzeit = "Frühling";
                    break;
                case "04":
                    $monatName = "April";
                    $jahrzeit = "Frühling";
                    break;
                case "05":
                    $monatName = "Mai";
                    $jahrzeit = "Frühling";
                    break;
                case "06":
                    $monatName = "Juni";
                    $jahrzeit = "Sommer";
                    break;
                case "07":
                    $monatName = "Juli";
                    $jahrzeit = "Sommer";
                    break;
                case "08":
                    $monatName = "August";
                    $jahrzeit = "Sommer";
                    break;
                case "09":
                    $monatName = "September";
                    $jahrzeit = "Herbst";
                    break;
                case "10":
                    $monatName = "Oktober";
                    $jahrzeit = "Herbst";
                    break;
                case "11":
                    $monatName = "November";
                    $jahrzeit = "Herbst";
                    break;
            }
            echo "<p>Der aktuelle Monat ist: $monatName. Es ist $jahrzeit.</p>";
            ?>
        </div>
        <div class="lotto">
            <h2>Lottozahlen</h2>
            <br>
            <?php
            $lottozahlen = array();
            $count = 0;
            while (true) {
                $lottozahlen[$count] = rand(1, 49);
                $count++;
              $newLottoList =  array_unique($lottozahlen);
                if (count($newLottoList) == 6) {
                    sort($newLottoList);
                    break;
                }
            }
            echo "<p>Die Lottozahlen sind: ";
            for ($i = 0; $i < 6; $i++) {
                echo $newLottoList[$i] . " ";
            }
            echo "</p>";
            ?>
        </div>
        <div class="geburtstag">
            <h2>Geburtstag</h2>
            <br>
            <form action="" method="get">
                <label for="geburtstag">Geburtstag:</label>
                <input type="date" name="geburtstag" id="geburtstag">
                <input type="submit" value="Berechnen">
            </form>
            <?php
            $geburtstag = isset($_GET["geburtstag"]) ? $_GET["geburtstag"] : "";
            if ($geburtstag) {
                $geburtstagDate = new DateTime($geburtstag);
                $heuteDate = new DateTime();
                $alterInterval = date_diff($geburtstagDate, $heuteDate);
                $alter = $alterInterval->y;
                $days = $alterInterval->d;
                echo "<p>Dein Alter beträgt: $alter Jahre</p>";

                if ($days % 365 == 0) {
                    echo "<p><b>Happy Birthday! 🎉</b></p>";
                }
            }
            ?>
        </div>

        <div class="wuerfelspiel">
            <h2>Würfelspiel</h2>
            <br>
            <?php
            $computer = array();
            $user = array();

            for ($i = 0; $i < 5; $i++) {
                $computer[$i] = rand(1, 6);
                $user[$i] = rand(1, 6);
            }
            sort($computer);
            sort($user);
            echo "<p>Die Würfelzahlen des Computers sind: ";
            for ($i = 0; $i < 5; $i++) {
                echo $computer[$i] . " ";
            }
            echo "</p>";
            echo "<p>Die Würfelzahlen des Users sind: ";
            for ($i = 0; $i < 5; $i++) {
                echo $user[$i] . " ";
            }
            echo "</p>";
            echo "<br>";
           for($i=4; $i>=0; $i--){
               if($computer[$i] > $user[$i]){
                   echo "<p>Der Computer hat gewonnen.</p>";
                   break;
               }else if($computer[$i] < $user[$i]){
                   echo "<p>Der User hat gewonnen.</p>";
                   break;
               } 
               else if($i == 0){
                   echo "<p>Unentschieden.</p>";
               }
              }

            ?>
        </div>
    </main>


</body>

</html>