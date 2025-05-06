<?php
    require 'functions.php';
    define('FILE_PATH','./numbers.json');
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
    <form method="POST" action="checking.php">
        <label>Upišite broj:</label><br>
        <input type="number" name="number" required><br><br>
        <button type="submit">Pošalji</button>
    </form>

    <!-- tablica -->
    <table border='1'>
      <tr>
        <th>Broj</th>
        <th>Par/Nepar</th>
        <th>Suma znamenki</th>
        <th>Broj znamenki</th>
      </tr>

      <?php foreach ($broj as $entry): ?>
        <tr>
            <td><?= htmlspecialchars($entry['broj']) ?></td>
            <td><?= htmlspecialchars($entry['par_nepar']) ?></td>
            <td><?= htmlspecialchars($entry['suma_znamenki']) ?></td>
            <td><?= htmlspecialchars($entry['broj_znamenki']) ?></td>
        </tr>
        <?php endforeach; ?>

    </table>

  </main>
</body>
</html>