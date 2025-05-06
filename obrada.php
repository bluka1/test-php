<?php
include("funkcije.php");
define('FILE_PATH', 'numbers.json');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST) && isset($_POST['broj'])) {
    $broj = $_POST['broj'];
    echo 'Ovo je poslani broj: ' . $broj . '<br>';

    if (is_numeric($broj) && (int)$broj == $broj) {
        echo "Validacija uspješna: " . $broj . " je stvarno broj i cijeli je broj.";
        echo '<br>';

        $parnost = provjeriParnost($broj);
        $suma = sumaSvihZnamenki($broj);
        $brojZnamenki = brojZnamenki($broj);

        $file_json = file_get_contents('numbers.json');
        $numbers = json_decode($file_json, true);

        $numbers[] = [
            'broj' => $broj,
            'parnost' => $parnost,
            'suma' => $suma,
            'znamenke' => $brojZnamenki
        ];

        $numbers_json = json_encode($numbers, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
        file_put_contents('numbers.json', $numbers_json);

        header('Location: /');
    } else {
        echo "Greška: Uneseni podatak nije cijeli broj.<br>";
    }
}
