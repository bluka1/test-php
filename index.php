<?php

    $jsonDatoteka = 'numbers.json';
    $brojevi = [];

    if (file_exists($jsonDatoteka)) {
        $sadrzajJson = file_get_contents($jsonDatoteka);
        $brojevi = json_decode($sadrzajJson, true);
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
    <?php
    require 'funkcije.php';
    define('FILE_PATH', 'numbers.json');
    ?>
  <main class="main">

      <form action="obrada.php" method="POST">
          <label>Upišite broj:
              <input type="text" name="broj" required>
          </label>
          <br>
          <br>
          <input type="submit" value="Pošalji">
      </form>

      <table>
          <tr>
              <th>Broj</th>
              <th>Par/Nepar</th>
              <th>Suma znamenki</th>
              <th>Broj znamenki</th>
          </tr>
          <?php
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