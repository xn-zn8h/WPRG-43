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
    <h2>Struktura plików</h2>
    <h3>Zadanie 3</h3>
    <p>
        Stwórz prosty formularz do obsługi zadania. Napisz funkcję, która
        przyjmie jako pierwszy argument ścieżkę (np. "./php/images/network"),
        jako drugi nazwę katalogu, a jako trzeci, opcjonalny parametr rodzaj
        operacji do wykonania:
        -read - odczytanie wszystkich elementów w katalogu (domyślna wartość
        parametru);
        -delete - usunięcie wskazanego katalogu w podanej ścieżce;
        -create - stworzenie katalogu w podanej ścieżce.
        Zwróć odpowiedni komunikat (listę elementów lub czy udało się
        stworzyć/usunąć katalog).
        Przy próbie odczytu pamiętaj o sprawdzeniu, czy dany katalog istnieje, a
        przy próbie usunięcia - czy katalog jest pusty i czy istnieje. Pamiętaj
        również o sprawdzeniu, czy ostatnim znakiem ścieżki jest "/" - ułatwi to
        wykonanie powyższych instrukcji.
    </p>
</div>
<br><hr><br>
<form method="get">
    <label>ścieżka do katalogu bazowego: <input type="text" name="path" required></label><br>
    <label>nazwa katalogu: <input type="text" name="name" required></label><br>
    <label>Operacja:
        <select name="operation">
            <option value="read">read</option>
            <option value="create">create</option>
            <option value="delete">delete</option>
        </select>
    </label><br>
    <input type="submit" value="wykonaj operację">
</form>

    <div class="result">
        <?php
        if (!empty($_GET['path']) && !empty($_GET['name'])) {
            $path = $_GET['path'];
            $name = $_GET['name'];
            $operation = $_GET['operation'] ?? 'read';
            katalogManager($path, $name, $operation);
        }

        function katalogManager($sciezka, $nazwa, $operacja = 'read') {
            // Upewniamy się, że ścieżka kończy się "/"
            if (substr($sciezka, -1) !== '/') {
                $sciezka .= '/';
            }

            $pelnaSciezka = $sciezka . $nazwa;

            switch ($operacja) {
                case 'read':
                    if (!is_dir($pelnaSciezka)) {
                        echo "Błąd: <b>$pelnaSciezka</b> nie istnieje.";
                    } else {
                        $zawartosc = scandir($pelnaSciezka);
                        echo "<b>Zawartość katalogu '$pelnaSciezka':</b><br><ul>";
                        foreach ($zawartosc as $element) {
                            if ($element != '.' && $element != '..') {
                                echo "<li>$element</li>";
                            }
                        }
                        echo "</ul>";
                    }
                    break;

                case 'create':
                    if (is_dir($pelnaSciezka)) {
                        echo "Katalog <b>$pelnaSciezka</b> już istnieje.";
                    } else {
                        if (mkdir($pelnaSciezka, 0777, true)) {
                            echo "Katalog <b>$pelnaSciezka</b> został utworzony.";
                        } else {
                            echo "Błąd: Nie udało się utworzyć katalogu <b>$pelnaSciezka</b>.";
                        }
                    }
                    break;

                case 'delete':
                    if (!is_dir($pelnaSciezka)) {
                        echo "Błąd: Katalog <b>$pelnaSciezka</b> nie istnieje.";
                    } elseif (count(scandir($pelnaSciezka)) > 2) {
                        echo "Błąd: Katalog <b>$pelnaSciezka</b> nie jest pusty.";
                    } else {
                        if (rmdir($pelnaSciezka)) {
                            echo "Katalog <b>$pelnaSciezka</b> został usunięty.";
                        } else {
                            echo "Błąd: Nie udało się usunąć katalogu <b>$pelnaSciezka</b>.";
                        }
                    }
                    break;

                default:
                    echo "NIEPRAWIDŁOWA OPERACJA: $operacja";
            }
        }
        echo strftime("<br><hr><p class='footer'><i style='color: cyan'>%Y.%m.%d %H:%M:%S</i><b> | </b><i><a style='color:hotpink;'>pehape działa poprawnie</i></a></p>");?>
    </div>
</body>
</html>
