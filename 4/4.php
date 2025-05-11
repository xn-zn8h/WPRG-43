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
    <h3>Zadanie 4</h3>
    <p>
        Napisz skrypt, w którym użytkownikom łączącym z wybranych
        adresów IP zapisanych w pliku tekstowym będzie wyświetlana inna
        strona niż wszystkim pozostałym.
        Podpowiedź: do sprawdzenia IP można użyć
        $_SERVER['REMOTE_ADDR'], a osobne strony (pliki PHP) można
        podłączyć poprzez include/require.
    </p>
</div>
<div class="center">
    <h4><a href="index.php">pierwsze zadanie</a></h4>
</div>
<br><hr><br>
</body>
</html>
<?php
$ip = 'ip.txt';
$user_ip = $_SERVER['REMOTE_ADDR'];
if (file_exists($ip)) {
    $lista = file($ip, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (in_array($user_ip, $lista)) {
        require 'sekret.html';
    }
    else {
        require 'zwykla.php';
    }
}

echo strftime("<br><hr><p class='footer'><i style='color: cyan'>%Y.%m.%d %H:%M:%S</i><b> | </b><i><a style='color:hotpink;'>pehape działa poprawnie</i></a></p>");?>



