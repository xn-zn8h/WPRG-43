<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadania 4</title>
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
    <h1>WPRG - Zadania 4</h1>
    <h2>Operacje na plikach</h2>
    <h3>Zadanie 2</h3>
    <p>
        Napisz skrypt ukazujący liczbę odwiedzin witryny. Dane powinny być
        zapisywane w postaci tekstowej w pliku licznik.txt. Każde wywołanie
        skryptu będzie powodowało otwarcie tego pliku, odczyt znajdujących się
        w nim danych, zwiększenie odczytanej wartości o jeden i ponowny zapis
        – zaktualizowanych już danych – do pliku. Upewnij się, że plik istnieje -
        jeśli nie, stwórz go i ustaw liczbę odwiedzin na 1.
    </p>
</div>
<div class="center">
    <h4><a href="3.php">następne zadanie</a></h4>
</div>
<br><hr><br>
</body>
</html>
<?php
$licznikPlik = 'licznik.txt';

if (!file_exists($licznikPlik)) {
    file_put_contents($licznikPlik, '1');
    $licznik = 1;
}
else {
    $licznik = (int)file_get_contents($licznikPlik);
    $licznik++;
    file_put_contents($licznikPlik, $licznik);
}
echo "Liczba odwiedzin: " . $licznik;

echo strftime("<br><hr><p class='footer'><i style='color: cyan'>%Y.%m.%d %H:%M:%S</i><b> | </b><i><a style='color:hotpink;'>pehape działa poprawnie</i></a></p>");?>



