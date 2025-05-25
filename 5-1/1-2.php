<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadania 5</title>
    <style>
        body {
            background-color:black;
            color:white;
            font-family: sans-serif;
        }
        h1 {
            color:mediumpurple;
            border: white;
            border-width: thick;
        }
        h2 {
            color:lawngreen;
        }
        .center {
            margin: auto;
            width: 50%;
            padding: 10px;
        }
        .footer {
            padding: 0px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="center">
    <h3>
        w zależności od ilości osób pozwala pobrać ich dane (pobrano na
        pierwszej podstronie 3 osoby, druga podstrona pozwala pobrać dane od 3 osób).
        Dodatkowo 2 przyciski zapisujący dane w sesji i pozwalający przejść do podstrony trzeciej.
    </h3>
</div>
<hr>

<?php
session_start();
if (isset($_POST['cvc'])) { //musi sprawdzac czy jest post z poprzedniej bo inaczej sie nadpisuje pustym i 1-3 nie ma
    $_SESSION['karta'] = $_POST['karta'];
    $_SESSION['cvc'] = $_POST['cvc'];
    $_SESSION['data'] = $_POST['data'];
    $_SESSION['holder'] = $_POST['holder'];
    $_SESSION['zamawiajacy'] = $_POST['zamawiajacy'];
    $_SESSION['ilosc'] = $_POST['ilosc'];
}
$ilosc = intval($_POST['ilosc']);
echo $_SERVER['REMOTE_ADDR'];
?>

<div class="center">
    <h2>Wprowadź dane dla <?= $ilosc ?> osób:</h2>
    <form method="post" action="1-2.php">
        <?php for ($i = 1; $i <= $ilosc; $i++): ?>
            <fieldset>
                <legend>Osoba <?= $i ?></legend>
                Imie i nazwisko: <input type="text" name="osoba[<?= $i ?>][imie]" required><br>
                Ulga: <input type="checkbox" name="osoba[<?= $i ?>][ulga]"><br>
            </fieldset>
            <br>
        <?php endfor; ?>
        <input type="submit" name="action" value="Zapisz do sesji">
    </form>
    <form method="post" action="1-3.php"><input type="submit" name="action" value="Przejdź do podstrony 3"></form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['osoba'])) {
    $_SESSION['osoby'] = $_POST['osoba'];

    if ($_POST['action'] === 'Przejdź do podstrony 3') {
        header("Location: 1-3.php");
        exit();
    } else {
        echo "<div class='center'><p>Dane zapisano w sesji.</p></div>";
    }
}
echo strftime("<br><hr><p class='footer'><i style='color: cyan'>%Y.%m.%d %H:%M:%S</i><b> | </b><i><a style='color:hotpink;'>pehape działa poprawnie</i></a></p>");?>

</body>
</html>


