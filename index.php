<?php
  define('FILE_PATH', './numbers.json');
  $json = file_get_contents(FILE_PATH);
  $brojevi = json_decode($json, true);

  function pretvoriBrojUString($broj) {
    return (string) $broj;
  }

  function jeParan($broj) {
    return $broj % 2 === 0 ? "paran" : "neparan";
  }

  function sumirajZnamenke($broj) {
    $br = pretvoriBrojUString($broj);
    $arr = str_split($br);
    return array_sum($arr);
  }

  function prebrojiZnamenke($broj) {
    $br = pretvoriBrojUString($broj);
    return strlen($br);
  }

  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["broj"])) {
    $input = trim($_POST["broj"]);

    $input = (int)$input;
    $noviBroj = [
      "broj" => $input,
      "parnost" => jeParan($input),
      "suma" => sumirajZnamenke($input),
      "znamenke" => prebrojiZnamenke($input)
    ];
    $brojevi[] = $noviBroj;
    file_put_contents(FILE_PATH, json_encode($brojevi, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
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
    <!-- ovdje dodajte formu i tablicu -->

    <!-- forma -->
    <form action="" method="post">
      <label>
        Upišite broj:
        <br>
        <input type="number" name="broj" required>
      </label>
      <br><br>
      <!-- <button type="submit">Pošalji</button> -->
      <input type="submit" value="Pošalji">
    </form>

    <!-- tablica -->
    <table border="1">
      <tr>
        <th>Broj</th>
        <th>Par/Nepar</th>
        <th>Suma znamenki</th>
        <th>Broj znamenki</th>
      </tr>
      <?php foreach ($brojevi as $broj): ?>
        <tr>
          <td><?php echo $broj['broj'] ?></td>
          <td><?php echo $broj['parnost'] ?></td>
          <td><?php echo $broj['suma'] ?></td>
          <td><?php echo $broj['znamenke'] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </main>
</body>
</html>