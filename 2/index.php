<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Zadania 2</title>
    </head>
    <body style="background-color:black; color:white;">
        <div>
            <h1>WPRG - Zadania 2</h1>
            <h3>Zadanie 1.</h3>
            <b>Stwórz prosty kalkulator:</b>
            <p>
                a. stwórz formularz z miejscem na wpisanie 2 liczb oraz wyborem działania
                (dodawanie, odejmowanie, mnożenie, dzielenie)<br>
                b. stwórz skrypt PHP, który obsłuży dane z formularza (na podstawie
                wybranego działania obliczy i wyświetli wynik w przeglądarce.
            </p>
        </div>
        <br><a href="2i3.php">zadanie 2 i 3</a><br><a href="4.php">zadanie 4</a><br>
        <br><hr><br>
        <h3>Kaukulator</h3>
        <div><i>wybierz na klawiaturze liczby i działanie, które chcesz wykonać, pozostawiając spację pomiędzy każdym znakiem, np 7 * 8</i></div>
        <form method="get">
            <input type="text" name="dzialanie" placeholder="wpisz działanie" spellcheck="false"></input>
            <input type="submit" value=" = ? ">
        </form>
        <hr><br>
    </body>
</html>
<?php
    if(!empty($_GET)){
        kaukulator($_GET["dzialanie"]);
        echo "<br>";
        kaukulator2($_GET["dzialanie"]);
        echo "<br>";
        //Debug
        echo "<hr><h1>WOWOWOW! Formularz wypełniony!</h1><h3>DEBUG</h3><b>Zawartość GETa:</b><br>";
        foreach ($_GET as $key => $value) {
            echo "$key: $value<br>";
        }
        }
    function kaukulator($input){
        $dzialanie = explode(" ", $input);
        if (count($dzialanie)/2 == 0) {
            echo "aaaaaaaaa";
            return false;
        }
        $wynik = (float)0;
        foreach ($dzialanie as $key => $value) {
            if ($key == 0){
                $wynik = $value;
                continue;
            }
            else if ($value == '+' || $value == '-' || $value == '*' || $value == '/') {
                continue;
            }
            else if (is_numeric($value)) {
                if ($dzialanie[$key - 1] == '+')$wynik += $value;
                else if ($dzialanie[$key - 1] == '-')$wynik -= $value;
                else if ($dzialanie[$key - 1] == '*')$wynik *= $value;
                else if ($dzialanie[$key - 1] == '/')$wynik /= $value;
            }
        }
        echo $input . " = " . $wynik . "<br>";
    }

function kaukulator2($input){
    $dzialanie = explode(" ", $input);
    if (count($dzialanie)/2 == 0) {
        echo "aaaaaaaaa złe działanie";
        return false;
    }
    $wynik = (float)0;
    //konwersja do rpn
    $rnp = [];
    $stos = [];
    foreach ($dzialanie as $pozycja => $wartosc) {
        if (is_numeric($wartosc)) {
            $rnp[] = $wartosc;
            continue;
        }
        else if ($wartosc == '+' || $wartosc == '-' || $wartosc == '*' || $wartosc == '/') {
            //WIP - musi porownac ze stosem czy ma nizszy(dodaje) priortyet https://en.wikipedia.org/wiki/Shunting_yard_algorithm
            array_unshift($stos, $wartosc);
            continue;
        }
        else if (is_numeric($value)) {
            if ($dzialanie[$key - 1] == '+')$wynik += $value;
            else if ($dzialanie[$key - 1] == '-')$wynik -= $value;
            else if ($dzialanie[$key - 1] == '*')$wynik *= $value;
            else if ($dzialanie[$key - 1] == '/')$wynik /= $value;
        }
    }
    //echo $input . " = " . $wynik . "<br>";     //wynik ulepszonego kodu
}

echo "<p style='color:limegreen;'>pehape działa poprawnie</p>"; ?>