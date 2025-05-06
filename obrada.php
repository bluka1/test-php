<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['broj'])) {
    $broj = $_POST['broj'];

    if (filter_var($broj, FILTER_VALIDATE_INT) !== false) {
        $file_json = file_get_contents('numbers.json');
        $numbers = json_decode($file_json, true);
        $parnost = ($broj % 2 == 0) ? 'paran' : 'neparan';
        $znamenke = str_split(str_replace('-', '', $broj));
        $suma = array_sum($znamenke);
        $brojZnamenki = count($znamenke);
        $numbers_json = json_encode($numbers, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
        file_put_contents('numbers.json', $numbers_json);

    } else {
        die();
    }


    $zapisJson = [
        'broj' => $broj,
        'parnost' => $parnost,
        'suma' => $suma,
        'brojZnamenki' => $brojZnamenki
    ];




}



