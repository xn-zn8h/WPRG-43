<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadania 2</title>
</head>
<body style="background-color:black; color:white;">
<div>
    <h1>WPRG - Zadania 2</h1>
    <h3>Zadanie 4.</h3>
    <b>Czy dana liczba jest liczbą pierwszą?</b>
    <p>
        a. stwórz formularz z miejscem na wpisanie liczby<br>
        b. stwórz skrypt PHP, który przyjmie liczbę z formularza (sprawdzi czy to na
        pewno liczba całkowita dodatnia), a następnie wywoła funkcję,
        sprawdzającą czy liczba jest liczbą pierwszą<br>
        c. w swoim programie umieść zmienną, która policzy wszystkie iteracje pętli,
        potrzebne do wykonania obliczeń. Spróbuj tak zmodyfikować program, by
        było potrzeba jak najmniej iteracji (przy zachowaniu prawidłowego
        działania).
    </p>
</div><br><hr><br>
<div>
    <h3>Rozwiązanie zadania 4 - Sprawdź czy liczba jest pierwsza</h3>
    <form method="post" action="">
        <label for="number">Podaj liczbę całkowitą dodatnią:</label>
        <input type="text" id="number" name="number" required>
        <input type="submit" value="Sprawdź">
    </form>
</div>
</body>
</html>
<?php
$iteracje = 0;
function czyLiczbaPierwsza($number) {
    if ($number == 1) {
        return false;
    }
    if ($number == 2) {
        return true;
    }
    if ($number % 2 == 0) {
        return false;
    }

    $sqrt = sqrt($number);
    for ($i = 3; $i <= $sqrt; $i += 2) {
        $iteracje++;
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $liczba = $_POST['number'];

    if (!ctype_digit($liczba)) {
        echo "<p style='color:red;'>To nie jest liczba całkowita dodatnia!</p>";
    } else {
        $number = intval($liczba);
        if ($number < 1) {
            echo "Podaj liczbę większą od 0!";
        } else {
            $czyPierwsza = czyLiczbaPierwsza($number, $iteracje);

            echo "Liczba $number " . ($czyPierwsza ? "<a style='color:limegreen;'>JEST</a>" : "<a style='color:red;'>NIE JEST</a>") . " liczbą pierwszą.<br><br>";
            echo "<i style='color:grey;'>Liczba iteracji pętli: $iteracje</i>";
        }
    }
}
echo "<p style='color:limegreen;'>pehape działa poprawnie</p>"; ?>