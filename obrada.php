<?php

include('funkcije.php');

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['brojevi']) && !empty($_POST['brojevi'])) {
$broj = $_POST['brojevi'];
  if(is_numeric($broj)) {
  //echo "Broj je: " . $broj;

    $containsJson = file_get_contents('numbers.json');
    $brojeviJson = json_decode($containsJson);
    $brojeviJson[] = [
      "broj" => $broj,
      "parnost" => parNepar($broj),
      "suma" => izracunajSumu($broj),
      "znamenke"=> izracunajBrojZnamenki($broj)
    ];
    $natragUJson = json_encode($brojeviJson, JSON_PRETTY_PRINT);
    file_put_contents('numbers.json', $natragUJson);
    header('Location:' . '/');

  } else {
    echo "Potrebno je upisati broj!";
  }
} else {
echo "Upišite broj!";
}