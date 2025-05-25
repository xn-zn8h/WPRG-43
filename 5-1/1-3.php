<?php session_start();

function printData($dane, $prefix = ''){
    foreach ($dane as $klucz => $wartosc) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($prefix . $klucz) . '</td>';
        echo '<td>';
        if (is_array($wartosc)) {
            printData($wartosc, $prefix . $klucz . ': ');
        } else {
            echo htmlspecialchars($wartosc);
        }
        echo '</td>';
        echo '</tr>';
    }
}

?>
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
        wyświetla podsumowanie wszystkich zebranych danych.
    </h3>
</div>
<hr>
<div class="center">
    <table>
        <tr>
            <th colspan="2">Dane</th>
        </tr>
        <?php
        if (!empty($_SESSION)) {printData($_SESSION);}
        ?>
    </table>
</div>
</body>
</html>
<?php
echo $_SERVER['REMOTE_ADDR'];

echo strftime("<br><hr><p class='footer'><i style='color: cyan'>%Y.%m.%d %H:%M:%S</i><b> | </b><i><a style='color:hotpink;'>pehape działa poprawnie</i></a></p>");?>



