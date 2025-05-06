<?php 
$jsonFile = 'numbers.json';

// Initialize data array
$data = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['number']) && $_POST['number'] !== '' && filter_var($_POST['number'], FILTER_VALIDATE_INT) !== false) {
        $number = (int)$_POST['number'];
        $isEven = ($number % 2 === 0) ? 'paran' : 'neparan';

        // Calculate sum of digits
        $digits = str_split((string)abs($number));
        $sum = array_sum($digits);
        $count = count($digits);

        // Save to data array
        $data[] = [
            'broj' => $number,
            'par_nepar' => $isEven,
            'suma_znamenki' => $sum,
            'broj_znamenki' => $count
        ];

        // Save to JSON file
        file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));
    } else {
        echo "<Molimo unesite cijeli broj.";
    }
}