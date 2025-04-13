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
    <h3>Zadanie 1</h3>
    <p>
        Utwórz prosty formularz, który pozwoli na wybranie daty urodzenia.
        Dane powinny zostać przesłane za pomocą metody GET. Po podaniu
        daty przez użytkownika, należy za pomocą osobnych funkcji sprawdzić i
        wyświetlić następujące informacje:
        <ul>
            <li>w jaki dzień tygodnia urodził się użytkownik;</li>
            <li>ukończone lata użytkownika;</li>
            <li>ilość dni do najbliższych, przyszłych urodzin.</li>
        </ul>
    </p>
</div>
<br><hr><br>
<div>
    <h3>Kaukulator</h3>
    <div><i>wybierz datę urodzenia</i></div>
    <form method="get">
        <input type="date" name="date" value="data urodzenia"></input>
        <input type="submit" value="POLICZ!">
    </form>
</div>
</body>
</html>
<?php
    $debug = FALSE;
if (!empty($_GET)) {
    kaukulator($_GET["date"]);
    echo "<br>";
    if($debug){
        //Debug
        echo "<hr><h1>WOWOWOW! Formularz wypełniony!</h1><h3>DEBUG</h3><b>Zawartość GETa:</b><br>";
        foreach ($_GET as $key => $value) {
            echo "$key: $value<br>";
        }
    }
}

//w jaki dzień tygodnia urodził się użytkownik
//ukończone lata użytkownika
//ilość dni do najbliższych, przyszłych urodzin
function kaukulator($dateInput) {
    $tydzien = ['niedziela', 'poniedziałek', 'wtorek', 'środa', 'czwartek', 'piątek', 'sobota'];

    $urodziny = strtotime($dateInput);
    $dzisiaj = strtotime(date('Y-m-d'));

    // dzień tygodnia
    $dzienTygodnia = date("w", $urodziny); // 0 = niedziela, 6 = sobota

    // obliczanie wieku
    $rokUrodzenia = date("Y", $urodziny);
    $miesiacUrodzenia = date("m", $urodziny);
    $dzienUrodzenia = date("d", $urodziny);

    $rokTeraz = date("Y");
    $urodzinyWtymRoku = strtotime("$rokTeraz-$miesiacUrodzenia-$dzienUrodzenia");
    $wiek = $rokTeraz - $rokUrodzenia;
    if ($dzisiaj < $urodzinyWtymRoku) {
        $wiek--; // Jeszcze nie miał urodzin w tym roku
    }

    //dni do urodzin
    $nastUrodziny = $urodzinyWtymRoku;
    if ($dzisiaj > $urodzinyWtymRoku) {
        $nastUrodziny = strtotime("next year", $urodzinyWtymRoku);
    }
    $dniDoUrodzin = ($nastUrodziny - $dzisiaj) / (60 * 60 * 24);

    //wyświetlenie
    echo "<b>Dzień tygodnia dnia urodzenia:</b> " . $tydzien[$dzienTygodnia] . "<br>";
    echo "<b>Ukończone lata:</b> $wiek<br>";
    echo "<b>Dni do następnych urodzin:</b> $dniDoUrodzin<br>";
}
echo strftime("<br><hr><p class='footer'><i style='color: cyan'>%Y.%m.%d %H:%M:%S</i><b> | </b><i><a style='color:hotpink;'>pehape działa poprawnie</i></a></p>");?>



