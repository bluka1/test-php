<?php
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    !empty($_POST) && isset($_POST['cijelibroj'])
) {

    $number = $_POST['cijelibroj'];
    $evenOrOdd = evenOrOdd($number);
    $sum = digitsSum($number);
    $count = digitsCounter($number);

//manipulacija JSON-om
    $numbersJson = file_get_contents('numbers.json');
    $numbersArray = json_decode($numbersJson, true);

    $numbersArray[] = [
        "broj" => $number,
        "parnost" => $evenOrOdd,
        "suma" => $sum,
        "znamenke" => $count,
    ];

    $newJsonNumbers = json_encode($numbersArray);

    file_put_contents('numbers.json', $newJsonNumbers);


//header
    header('Location: index.php');


} else {
    echo 'upisite broj';
}


//funkcije
function evenOrOdd($number)
{
    if ($number % 2 == 0) {
        return 'paran';
    } else {
        return 'neparan';
    }
}

function digitsSum($number)
{
    $numberArray = str_split((string)$number);
    return array_sum($numberArray);
}

function digitsCounter($number)
{
    $numberArray = str_split((string)$number);
    return count($numberArray);
}



