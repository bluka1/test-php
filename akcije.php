<?php
define('FILE_PATH', __DIR__ . '/numbers.json');
require 'funkcije.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['broj'])) {

    // provjeravam je li 'broj' cijeli broj (ctype_digit provjerava samo pozitivne cijele brojeve)
    // ako nije, onda doviđenja
    if (!ctype_digit($_POST['broj'])) {
        die('Uneseni broj nije cijeli broj.');
    }


    // sada u varijable spremam sve funkcije koje su definirane u funkcije.php

    $broj = $_POST['broj'];
    $cijeliBroj = cijeliBroj($broj);
    $parIliNepar = parIliNepar($broj);
    $zbrojiSveZnamenke = zbrojiSveZnamenke($broj);
    $izracunajBrojZnamenki = izracunajBrojZnamenki($broj);

    // podaci za pospremanje u json
    $data = [
        'broj' => $broj,
        'parnost' => $parIliNepar,
        'suma' => $zbrojiSveZnamenke,
        'znamenke' => $izracunajBrojZnamenki,
    ];

    // čitamm postojeće podatke iz datoteke, ako ne postoji, inicijaliziram prazan niz


    $podaci = file_exists(FILE_PATH) ? json_decode(file_get_contents(FILE_PATH), true) : [];


    // dodajem naš novi član u niz ako je sve OK!
    $podaci[] = $data;

    // i sada podatke spremam u datoteku
    file_put_contents(FILE_PATH, json_encode($podaci, JSON_PRETTY_PRINT));

    // i onda preusmjeravam na index.php
    header('Location: ' . '/');
}


?>