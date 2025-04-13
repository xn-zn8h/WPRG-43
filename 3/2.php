<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadania 3</title>
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
    <h1>WPRG - Zadania 3</h1>
    <h2>Data i czas</h2>
    <h3>Zadanie 2</h3>
    <p>
        Wybierz jeden z dwóch algorytmów: liczenie silni lub dowolny wyraz
        ciągu Fibonacciego. Napisz funkcję rekurencyjną oraz jej zwykły
        odpowiednik (nierekurencyjny) dla wybranego algorytmu. Obie funkcje
        powinny przyjmować stosowny argument. Następnie zmierz działanie
        obu funkcji dla argumentu podanego przez użytkownika i wyświetl
        informacje o tym, która funkcja i o ile działała szybciej.
    </p>
</div>
<br><hr><br>
<div>
    <h3>Kaukulator</h3>
    <div><i>wpisz liczbę, dla której obliczyć silnię (tylko całkowite większe niż 1)</i></div>
    <form method="get">
        <input type="number" name="number" value="silnia dla"><input type="submit" value="!"> =
    </form>
</div>
</body>
</html>
<?php
$debug = FALSE;
if (!empty($_GET)) {
    $start1 = microtime(true);
    echo("Nie-rekurencyjnie: " . silniaNierek($_GET["number"]));
    $czas1 = microtime(true) - $start1;
    echo(" obliczone w czasie: " . round($czas1 * 1000000, 2) . " mikrosekund<br><br>");

    echo "<br>";

    $start2 = microtime(true);
    echo("Rekurencyjnie: " . silniaRek($_GET["number"]));
    $czas2 = microtime(true) - $start2;
    echo(" obliczone w czasie: " . round($czas2 * 1000000, 2) . " mikrosekund<br><br>");

    echo "<br><b>szybsza była funkcja";

    if ($czas1 < $czas2) {
        echo " nierekurencyjna</b><br>";
    } elseif ($czas2 < $czas1) {
        echo " rekurencyjna</b><br>";
    } else {
        echo "... żadna! obie były tak samo szybkie</b><br>";
    }

    if($debug){
        //Debug
        echo "<hr><h1>WOWOWOW! Formularz wypełniony!</h1><h3>DEBUG</h3><b>Zawartość GETa:</b><br>";
        foreach ($_GET as $key => $value) {
            echo "$key: $value<br>";
        }
    }
}
function silniaNierek($liczba){
    if($liczba<=1){
        return "wybierz coś większego niż jeden...";
    }
    $liczba = round($liczba);
    $wynik = 1;
    for($i=1;$i<=$liczba;$i++){
        $wynik = $wynik*$i;
    }
    return $wynik;
}
function silniaRek($liczba) {
    if ($liczba <= 1) return 1;
    return $liczba * silniaRek($liczba - 1);
}

echo strftime("<br><hr><p class='footer'><i style='color: cyan'>%Y.%m.%d %H:%M:%S</i><b> | </b><i><a style='color:hotpink;'>pehape działa poprawnie</i></a></p>");?>


