<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="home-style.css">
</head>

<body>
    <?php
     session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo "<header><h1>User Page</h1></header>";
    echo "<br><br>";
    ?>
    <div class="usertable">
        <table>
            <tr>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <tr>
                <td><?php echo $email; ?></td>
                <td><?php echo $password; ?></td>
            </tr>
        </table>
    </div>
<div class="kalorie">
    <h2>Kalkulate deine tagliche kalorie.</h2>
    <form action="calorie.php" method="post">
        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" name="weight" required><br><br>
        <label for="height">Height (cm):</label>
        <input type="number" id="height" name="height" required><br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
        <br><br>
        <input type="submit" value="Kalkulate" class="submit">
        </form>
</div>

<div class="mathetrainer">

<h2>Mathetrainer</h2>

<?php
 if (!isset($_SESSION['number1']) || !isset($_SESSION['number2'])) {
    $_SESSION['number1'] = rand(1, 10);
    $_SESSION['number2'] = rand(1, 10);
    $_SESSION['result'] = $_SESSION['number1'] + $_SESSION['number2'];
}
echo "<p>Was ist {$_SESSION['number1']} + {$_SESSION['number2']}?</p>";
?>
<form action="home.php" method="post">
    <label for="answer">Answer:</label>
    <input type="number" id="answer" name="answer" required><br><br>
    <input type="submit" value="Check" class="submit">
</form>
<?php
if (isset($_POST['answer'])) {
    $answer = $_POST['answer'];
    if ($answer != null && $answer == $_SESSION['result']) {
        echo "<p class='answer'>Das ist richtig!</p>";
    } else {
        echo "<p class='answer'>Das ist falsch! Die richtige Antwort ist: {$_SESSION['result']}</p>";
    }
    // Clear session variables for next question
    unset($_SESSION['number1']);
    unset($_SESSION['number2']);
    unset($_SESSION['result']);
}
?>
</div>

</body>

</html>