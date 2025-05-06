<?php
  define('FILE_PATH', 'numbers.json')
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>test php</title>

  <style>
    .main {
      display: flex;
      justify-content: space-evenly;
      background: url(../test-php/dizajn.png) no-repeat center;
      background-size: cover;
    }
  </style>
  
</head>
<body>
  <main class="main">
    <form action="index.php" method="POST">
    <label>Upisite cijeli broj:
      <input type="number" name="broj" required>
      <button type="submit">Posalji</button>
    </label>
    </form>


    <table border="1" cellpadding='5' display: flex;>
      <tr>
        <th>Broj</th>
        <th>Parnost</th>
        <th>Suma</th>
        <th>Znamenke - broj znamenki</th>
      </tr>

<?php

function parnost(int $broj): string {
  return $broj % 2 === 0 ? 'paran' : 'neparan';
}

function sumaZnamenki(int $broj): int {
  $znamenke = str_split((string)abs($broj));
  return array_sum($znamenke);
}

function izracunajBrojZnamenki(int $broj): int {
  return strlen((string)abs($broj));
}
?>

<?php

$json_file = 'numbers.json';
$brojevi = [];

if (file_exists($json_file)) {
    $brojevi = json_decode(file_get_contents($json_file), true);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" 
    && isset($_POST['broj']) 
    && is_numeric($_POST['broj'])) {
    $uneseniBroj = (int)$_POST['broj'];
    $parnost = parnost($uneseniBroj);
    $sumaZnamenki = sumaZnamenki($uneseniBroj);
    $brojZnamenki = izracunajBrojZnamenki($uneseniBroj);

    $analiziraniBroj = [
        "broj" => $uneseniBroj,
        "parnost" => $parnost,
        "suma" => $sumaZnamenki,
        "znamenke" => $brojZnamenki
    ];

    $brojevi[] = $analiziraniBroj;

    file_put_contents($json_file, json_encode($brojevi, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT));
}
  foreach ($brojevi as $broj) {
      echo '<tr>';
      foreach ($broj as $vrijednost) {
      echo '<td>' . htmlspecialchars($vrijednost) . '</td>';
      }
      echo '</tr>';
    }
?>
    </table>
  </main>
</body>
</html>