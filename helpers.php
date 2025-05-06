<?php

define('FILE_PATH', './numbers.json');

$number = $_POST['number']; 

function paranNeparan($number) {
    if ($number % 2 === 0) {
        return "paran";
    } else {
        return "neparan";
    }    
}

function sumaSvihZnamenki($number) {          
    $digits = str_split((string)$number);  
    return array_sum($digits);             
}

function brojSvihZnamenki($number) {
    return strlen((string)$number);
}

function citajJsonDatoteku($filePath) {
    $numbersJson = file_get_contents($filePath, false);
    $arrayOfNumbers = json_decode($numbersJson);
    return $arrayOfNumbers;
  }

$numbers = citajJsonDatoteku(FILE_PATH); 

function dodajBroj($number) {
    $number = (int)$number; 
    $newEntry = [
        'broj' => $number,
        'parnost' => paranNeparan($number), 
        'suma' => sumaSvihZnamenki($number), 
        'znamenke' => brojSvihZnamenki($number) 
    ];

    $file_json = file_exists(FILE_PATH) ? file_get_contents(FILE_PATH) : '[]';
    $numbers = json_decode($file_json, true);

    $numbers[] = $newEntry;

    $numbers_json = json_encode($numbers, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents(FILE_PATH, $numbers_json);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number = $_POST['number'] ?? '';
    if ($number === '' || !ctype_digit($number)) {
        echo 'Polje ne smije biti prazno i mora biti unesen cijeli broj.';
    } else {
        echo "Uneseni broj: " . $number;
    }
    dodajBroj($number);
}
?>