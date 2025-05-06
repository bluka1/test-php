<?php
require_once 'funkcije.php';

$jsonDatoteka = 'numbers.json';
$brojevi = [];

if (file_exists($jsonDatoteka)) {
    $brojevi = json_decode(file_get_contents($jsonDatoteka), true);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['broj']) && is_numeric($_POST['broj'])) {
    $uneseniBroj = (int)$_POST['broj'];
    $parnost = odrediParnost($uneseniBroj);
    $sumaZnamenki = izracunajSumuZnamenki($uneseniBroj);
    $brojZnamenki = izracunajBrojZnamenki($uneseniBroj);

    $analiziraniBroj = [
        "broj" => $uneseniBroj,
        "parnost" => $parnost,
        "suma" => $sumaZnamenki,
        "znamenke" => $brojZnamenki
    ];

    $brojevi[] = $analiziraniBroj;

    file_put_contents($jsonDatoteka, json_encode($brojevi, JSON_PRETTY_PRINT));
}

header("Location: index.php");
exit;

