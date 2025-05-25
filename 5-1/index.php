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
    <h1>WPRG - Zadania 5</h1>
    <h2>Ciasteczka i sesje</h2>
    <h3>Zadanie 1</h3>
    <p>
    <ol>
        <li>Pierwsza podstrona ma pobierać dane ogólne np. nr karty, dane zamawiającego,
            ilość osób itp.</li>
        <li>Druga podstrona w zależności od ilości osób pozwala pobrać ich dane (pobrano na
            pierwszej podstronie 3 osoby, druga podstrona pozwala pobrać dane od 3 osób).
            Dodatkowo 2 przyciski zapisujący dane w sesji i pozwalający przejść do podstrony trzeciej.</li>
        <li>Trzecia podstrona wyświetla podsumowanie wszystkich zebranych danych.</li>
    </ol>
    </p>
</div>
<br><hr><br>
<div class="center">
    <iframe src="1-1.php" height="1200px" width="80%"></iframe>
</div>

<br><hr><br>
<div class="center">
    <h3>Zadanie 2 i 3</h3>
    <ol>
        <b>2</b> Napisz skrypt, który za pomocą cookies zlicza liczbę odwiedzin strony przez danego
        użytkownika i po osiągnięciu zadanej wartości wyświetla stosowną informację.
    </ol>
    <ol>
        <b>3</b> Zmodyfikuj skrypt licznika, który nie będzie uwzględniał przeładowań (odświeżania) strony.
        Wykorzystaj pliki cookie.
    </ol>
</div>

<div style="display:flex; text-align: center;">
    <div style="flex: 1;"><h3>2</h3><iframe src="2.php" width="100%" height="500px"></iframe></div>
    <div style="flex: 1;"><h3>3</h3><iframe src="3.php" width="100%" height="500px"></iframe></div>
</div>
</body>
</html>
<?php

echo $_SERVER['REMOTE_ADDR'];

echo strftime("<br><hr><p class='footer'><i style='color: cyan'>%Y.%m.%d %H:%M:%S</i><b> | </b><i><a style='color:hotpink;'>pehape działa poprawnie</i></a></p>");?>



