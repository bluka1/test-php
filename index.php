<?php
  function brojParanNeparan($broj) {
    if ($broj % 2 === 0) {
      return 'paran';
    } else {
      return 'neparan';
    }
  }
  function sumaZnamenki($broj) {
    $suma = 0;
    $znamenkeBroja = str_split($broj);
      foreach ($znamenkeBroja as $znamenka) {
        $suma += (int)$znamenka;
    }
    return $suma;
  }
  function brojZnamenki($broj) {
    $znamenkeBroja = str_split($broj);
      return count($znamenkeBroja);
  }
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST' &&!empty($_POST) && isset($_POST['broj'])) {
    $broj = $_POST['broj'];
    $file_Json = file_get_contents('numbers.json');
    $nizBrojeva = json_decode($file_Json, true);
    $nizBrojeva[] = [
      'broj' => $broj,
      'parnost' => brojParanNeparan($broj),
      'suma' => sumaZnamenki($broj),
      'znamenke' => brojZnamenki($broj)
    ];
    $brojevi_Json = json_encode($nizBrojeva, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
      file_put_contents('numbers.json', $brojevi_Json);
  }
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
    }
  </style>
  
</head>
<body>
  <main class="main">
    <!-- forma -->
    <form action="index.php" method="POST">
      <label for="broj">Upišite broj <br>
        <input type="number" name="broj" required>
      </label>
        <br>
        <br>
      <input type="submit" value="Pošalji">
    </form>

    <!-- tablica -->

    <table border="1">
      <th>Broj</th>
      <th>Par/Nepar</th>
      <th>Suma Znamenki</th>
      <th>Broj Znamenki</th>
    <?php
      $brojevi_Json = file_get_contents('numbers.json');
      $brojevi = json_decode($brojevi_Json, true);
      foreach ($brojevi as $broj) {
        echo "<tr>";
          foreach ($broj as $vrijednost) {
            echo "<td>$vrijednost</td>";
          }
        echo "</tr>";
      }
    ?>
    </table>
  </main>
</body>
</html>