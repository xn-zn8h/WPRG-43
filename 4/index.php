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
    <h3>Zadanie 1</h3>
    <p>
        Napisz skrypt, który odwróci kolejność wierszy w pliku tekstowym (tzn.
        ostatni wiersz ma się stać pierwszym, przedostatni drugim itd…). Do
        wykonania zadania stwórz prosty formularz z możliwością wyboru pliku <pre id="html-code"></pre>
    <script>document.getElementById("html-code").textContent = '(<INPUT TYPE=”FILE”>).';</script>
    </p>
</div>
<div class="center">
    <h4><a href="2.php">następne zadanie</a></h4>
</div>
<br><hr><br>
<div align="center">
    <h2 style="letter-spacing: 2vw;">PROSTY</h2>
    <h4><i>formularz</i></h4>
    <div><i>możliwość wyboru pliku</i></div>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept=".txt">
        <input type="submit" value="wyślij">
    </form>

</div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['file'])) {
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $mimeType = mime_content_type($_FILES['file']['tmp_name']);
        if (strpos($mimeType, 'text/') === 0) {
            $lines = file($_FILES['file']['tmp_name'], FILE_IGNORE_NEW_LINES);
            if ($lines !== false) {
                $reversedLines = array_reverse($lines);

                echo "<h3>odwrócony:</h3>";
                echo "<pre style='background-color: #333; padding: 10px; color: white;'>";
                foreach ($reversedLines as $line) {
                    echo htmlspecialchars($line) . "\n";
                }
                echo "</pre>";
            }
        }
    }
    else {
        echo "<p style='color: red;'>Błąd odczytu " . $_FILES['file']['error'] . "</p>";
    }
}

echo strftime("<br><hr><p class='footer'><i style='color: cyan'>%Y.%m.%d %H:%M:%S</i><b> | </b><i><a style='color:hotpink;'>pehape działa poprawnie</i></a></p>");?>



