<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadania 2</title>
</head>
<body style="background-color:black; color:white;">
<div>
    <h1>WPRG - Zadania 2</h1>
    <h3>Zadanie 2.</h3>
    <b>Stwórz formularz rezerwacji hotelu:</b>
    <p>
        a. stwórz formularz, który będzie pozwalał: podać z listy rozwijanej ilość
        osób (1-4), których dotyczy rezerwacja, wpisać dane osoby rezerwującej
        pobyt np. imię, nazwisko, adres, dane karty kredytowej, e-mail, podać
        datę pobytu, czy godzinę przyjazdu itd. (pamiętając o odpowiedniej
        walidacji pól - typach), zaznaczyć czy jest potrzeba dostawienia łóżka dla
        dziecka, z listy wybrać odpowiednie udogodnienia np. klimatyzacja i
        popielniczka dla palacza (pamiętaj określić które pola są wymagane)<br>
        b. stwórz skrypt PHP, który odbierze powyższe dane i w ładny i przejrzysty
        sposób wyświetli podsumowanie rezerwacji (użyć do wyświetlenia
        szablonu HTML)
    </p>
</div>
<div>
    <h3>Zadanie 3.</h3>
    Dla zadania nr 2 dodaj krok, w którym w zależności od liczby osób wyświetli się formularz,
    który pozwoli uzupełnić podstawowe dane tych osób w zgrupowanych formularzach i doda
    tę informację do podsumowania rezerwacji.
</div>

<br><hr><br>



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['step']) && $_POST['step'] == 'people') {
        $people = (int)$_POST['people'];

        echo "<h3>Rezerwacja</h3>";
        echo '<form method="post" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'">
            <input type="hidden" name="step" value="details">
            <input type="hidden" name="people" value="'.$people.'">';

        echo '<h4>Dane osoby rezerwującej</h4>
            <p><label>Imię: <input type="text" name="firstName" required></label></p>
            <p><label>Nazwisko: <input type="text" name="lastName" required></label></p>
            <p><label>Email: <input type="email" name="email" required></label></p>
            <p><label>Data przyjazdu: <input type="date" name="arrivalDate" required></label></p>
            <p><label><input type="checkbox" name="childBed"> Łóżko dla dziecka</label></p>
            
            <h3>Udogodnienia</h3>
            <p>
                <label><input type="checkbox" name="amenities[]" value="Klimatyzacja"> Klimatyzacja</label><br>
                <label><input type="checkbox" name="amenities[]" value="Popielniczka"> Popielniczka</label><br>
                <label><input type="checkbox" name="amenities[]" value="WiFi"> WiFi</label><br>
                <label><input type="checkbox" name="amenities[]" value="Parking"> Parking</label>
            </p>';
        if ($people > 1) {
            echo '<h4>Dane dodatkowych osób</h4>';
            for ($i = 1; $i < $people; $i++) {
                echo '<h3>Osoba '.($i+1).'</h3>
                    <p><label>Imię: <input type="text" name="person_'.$i.'_firstName" required></label></p>
                    <p><label>Nazwisko: <input type="text" name="person_'.$i.'_lastName" required></label></p>';
            }
        }
        echo '<p><input type="submit" value="Zarezerwuj"></p>
            </form>';

    } elseif (isset($_POST['step']) && $_POST['step'] == 'details') {
        $people = (int)$_POST['people'];
        $firstName = $_POST['firstName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $email = $_POST['email'] ?? '';
        $arrivalDate = $_POST['arrivalDate'] ?? '';
        $childBed = isset($_POST['childBed']) ? 'Tak' : 'Nie';
        $amenities = isset($_POST['amenities']) ? implode(', ', $_POST['amenities']) : 'Brak';
        $additionalPeople = [];
        for ($i = 1; $i < $people; $i++) {
            if (!empty($_POST["person_{$i}_firstName"])) {
                $additionalPeople[] = [
                    'firstName' => $_POST["person_{$i}_firstName"],
                    'lastName' => $_POST["person_{$i}_lastName"]
                ];
            }
        }
        echo "<h2>Podsumowanie</h2>";
        echo '<h3>Dane główne</h3>
            <p><strong>Ilość osób:</strong> '.$people.'</p>
            <p><strong>Imię:</strong> '.htmlspecialchars($firstName).'</p>
            <p><strong>Nazwisko:</strong> '.htmlspecialchars($lastName).'</p>
            <p><strong>Email:</strong> '.htmlspecialchars($email).'</p>
            <p><strong>Data przyjazdu:</strong> '.htmlspecialchars($arrivalDate).'</p>
            <p><strong>Łóżko dla dziecka:</strong> '.$childBed.'</p>
            <p><strong>Udogodnienia:</strong> '.htmlspecialchars($amenities).'</p>';

        if (!empty($additionalPeople)) {
            echo '<h3>Dodatkowe osoby</h3>';
            foreach ($additionalPeople as $i => $person) {
                echo '<p><strong>Osoba '.($i+2).':</strong> '
                    .htmlspecialchars($person['firstName']).' '
                    .htmlspecialchars($person['lastName']).'</p>';
            }
        }

        echo '<p><a href="'.htmlspecialchars($_SERVER['PHP_SELF']).'">Powrót do formularza</a></p>';
    }
} else {
    echo "<h3>Rezerwacja hotelu - liczba osób</h3>";
    echo '<form method="post" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'">
        <input type="hidden" name="step" value="people">
        <p>
            <label>Wybierz liczbę osób (1-4):
                <select name="people" required>';

    for ($i = 1; $i <= 4; $i++) {
        echo '<option value="'.$i.'">'.$i.'</option>';
    }
    echo '      </select>
            </label>
        </p>
        <p><input type="submit" value="Dalej"></p>
        </form>';
}

echo "<p style='color:limegreen;'>pehape działa poprawnie</p>"; ?>

</body>
</html>