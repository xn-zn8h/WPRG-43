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
    <h3>Zadanie 3</h3>
    <p>
        Napisz skrypt tworzący listę odnośników. Wszystkie adresy wraz z ich
        opisami przechowywane będą w pliku tekstowym. Każdy wiersz pliku
        będzie miał schematyczną postać (adres;opis):
        http://ardes_odnośnika/;opis adresu
    </p>
</div>
<div class="center">
    <h4><a href="4.php">następne zadanie</a></h4>
</div>
<br><hr><br>
</body>
</html>
<?php
$plik = 'linki.txt';
if (file_exists($plik)) {
    $lines = file($plik, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($lines) {
        echo "<ul>\n";

        foreach ($lines as $line) {
            $parts = explode(';', $line);
            if (count($parts) == 2) {
                $link = trim($parts[0]);
                $opis = trim($parts[1]);
                echo "<li><a href='$link'>$opis</a></li>\n";
            }
        }
        echo "</ul>\n";
    }
    else {
        echo "<p style='color: red;'>Błąd odczytu</p>";
    }
}
else {
    echo "Plik $plik nie istnieje.";
}

echo strftime("<br><hr><p class='footer'><i style='color: cyan'>%Y.%m.%d %H:%M:%S</i><b> | </b><i><a style='color:hotpink;'>pehape działa poprawnie</i></a></p>");?>



