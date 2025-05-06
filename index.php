<?php
define('FILE_PATH', './numbers.json')
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


    <form action="obrada.php" method="POST">
      <label>
        Upišite broj: <br>
        <input type="number" name="broj" required>
      </label>
      <br><br>
      <input type="submit" value="Pošalji">
    </form>
    <br><br>

    <table border="1">
      <tr>
        <th>Broj</th>
        <th>Par/Nepar</th>
        <th>Suma znamenki</th>
        <th>Broj znamenki</th>
      </tr>

      <?php
      $file_json = file_get_contents(FILE_PATH);
      $numbers = json_decode($file_json, true);
      foreach ($numbers as $broj => $zapisJson) {

        echo "<tr>";
        echo "<td>" . $broj . "</td>";
        echo "<td>" . $parnost . "</td>";
        echo "<td>" . $suma . "</td>";
        echo "<td>" . $brojZnamenki . "</td>";
        echo "</tr>";

      }
      ?>
    </table>

  </main>
</body>

</html>