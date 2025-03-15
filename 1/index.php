<html>
    <head>
        <title>Zadania 1</title>
    </head>
    <body style="background-color:black; color:white;">
            <h1>WPRG - Zadania 1</h1>
            <h3>Zadanie 1.</h3>
            Stwórz tablicę zawierającą nazwy kilku owoców (np. "jabłko", "banan", "pomarańcza"). Napisz
            pętlę, która wyświetli każdy owoc w osobnej linii, pisany od tyłu (nie używaj żadnej funkcji
            wbudowanej) oraz informację, czy dany owoc zaczyna się literą "p".
            <h3>Zadanie 2.</h3>
            Napisz program, który wypisze na ekranie wszystkie liczby pierwsze z zadanego zakresu.
            <h3>Zadanie 3.</h3>
            Dla zadanego N napisz program wyliczający N-tą liczbę Fibonacciego. Ciąg powinien zostać
            zapisany w tablicy, a następnie program wypisze nieparzyste elementy tablicy. Każdy element
            powinien być w nowej linii, a linie powinny być ponumerowane.
            <h3>Zadanie 4.</h3>
            Stwórz z tekstu tablicę (używając explode):
            <p><i>
                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                galley of type and scrambled it to make a type specimen book. It has survived not only five
                centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
                popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                and more recently with desktop publishing software like Aldus PageMaker including versions of
                Lorem Ipsum."</i></p>
            Z utworzonej tablicy usuń wszystkie elementy ze znakami interpunkcyjnymi, używając pętli.
            Przeiteruj się przez każdy element tabeli, sprawdź, czy ten element jest znakiem
            interpunkcyjnym, jeśli jest, to usuń go przez przesunięcie każdego następnego elementu o jeden
            do tyłu, nie używaj regexu, ale użyj pętli for i instrukcji if.
            Na podstawie otrzymanej tablicy utwórz tablicę asocjacyjną przy pomocy pętli foreach, gdzie
            kolejne elementy nieparzyste będą kluczami, a elementy po nich następujące wartościami.
            Każdą parę wypisz w oddzielnej linii.
            <br><hr><br>
    </body>
</html>

<?php
echo "<h3>1</h3>"; owoce();
echo "<h3>2</h3>"; pierwsze(20);
echo "<h3>3</h3>"; fib(10);
echo "<h3>4</h3>"; eksplozja();
    function owoce() {
        $separator = " | ";
        $owoce = array("jabuszko", "banan", "pomelo", "brzoskwinia", "pomidor");
        foreach ($owoce as $owoc) {
            $cowo = '';
            for ($i = strlen($owoc) - 1; $i >= 0; $i--) {
                $cowo .= $owoc[$i];
            }
            echo "$owoc" . $separator . $cowo . $separator . ($owoc[0] == "p" ? "" : "nie ") . "zaczyna się na p<br>";
        }
    }
    function pierwsze($n) {
        for ($i = 2; $i <= $n; $i++) {
            if (sprawdzenie($i)) {
                echo $i . ", ";
            }
        }
    }
    function sprawdzenie($liczba) {
        if ($liczba < 2) {
            return false;
        }
        for ($j = 2; $j <= sqrt($liczba); $j++) {
            if ($liczba % $j == 0) {
                return false;
            }
        }
        return true;
    }
    function fib($n) {
        if ($n < 1) return;
        $liczby = [0, 1];
        for ($i = 2; $i < $n; $i++) {
            $liczby[] = $liczby[$i - 1] + $liczby[$i - 2];
        }
        $linia = 1;
        foreach ($liczby as $liczba) {
            if ($liczba % 2 != 0) {
                echo $linia . ". " . $liczba . "<br>";
                $linia++;
            }
        }
        echo $n . " liczba fibonaczjego: " . $liczby[$n - 1];
    }
    function eksplozja(){
        $text = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $eksplodowane = explode(" ", $text);
        $interpunkcyjne = [".", ",", ";", "!", "?"];
        for ($i = sizeof($eksplodowane) - 1; $i >= 0; $i--) {
            $slowo = $eksplodowane[$i];
            $ostatni = substr($slowo, -1);
            if (in_array($ostatni, $interpunkcyjne)) {
                $eksplodowane[$i] = substr($slowo, 0, -1);
                if (empty($eksplodowane[$i])) {
                    unset($eksplodowane[$i]);
                }
            }
        }
        $eksplodowane = array_values($eksplodowane);
        $asoc = [];
        foreach (array_chunk($eksplodowane, 2) as $para) {
            if (count($para) === 2) {
                $asoc[$para[0]] = $para[1];
            }
        }
        foreach ($asoc as $key => $value) {
            echo "$key $value" . "<br>";
        }
    }
?>