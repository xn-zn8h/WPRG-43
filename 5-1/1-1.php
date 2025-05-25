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
        ma pobierać dane ogólne np. nr karty, dane zamawiającego,
        ilość osób itp.
    </h3>
</div>
<hr>
<div class="center">
    <form action="1-2.php" method="post">
        <table>
            <tr>
                <th colspan="2">Dane karty</th>
            </tr>
            <tr>
                <td>Numer karty: </td>
                <td><input type="number" name="karta" required></td>
            </tr>
            <tr>
                <td>CVC: </td>
                <td><input type="number" name="cvc" placeholder="123" required></td>
            </tr>
            <tr>
                <td>Data wygaśnięcia:</td>
                <td><input type="text" name="data" placeholder="05/25" required></td>
            </tr>
            <tr>
                <td>Imie i nazwisko:</td>
                <td><input type="text" name="holder" placeholder="Jan Kowalski" required></td>
            </tr>
            <tr>
                <th colspan="2"><hr>Zamawiający:</th>
            </tr>
            <tr>
                <td>Imie i nazwisko:</td>
                <td><input type="text" name="zamawiajacy" placeholder="Jan Kowalski" required></td>
            </tr>
            <tr>
                <td>Ilość osób:</td>
                <td><input type="number" name="ilosc" required></td>
            </tr>
        </table>
        <input type="submit" value="dalej">
    </form>
</div>
</body>
</html>
<?php
session_start();

echo $_SERVER['REMOTE_ADDR'];

echo strftime("<br><hr><p class='footer'><i style='color: cyan'>%Y.%m.%d %H:%M:%S</i><b> | </b><i><a style='color:hotpink;'>pehape działa poprawnie</i></a></p>");?>



