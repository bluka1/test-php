<?php 

include 'helpers.php';

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
    <form action="" method="POST">
      <label>
        Upišite broj:
        <br>
        <input type="text" name="number" required>
      </label>
      <br>
      <input type="submit" value="Pošalji">
    </form>
    <!-- tablica -->
    <table border="1">
      <tr>
        <th>Broj</th>
        <th>Par/Nepar</th>
        <th>Suma znamenki</th>
        <th>Zbroj znamenki</th>
      </tr>
      <?php
      $file_json = file_get_contents(FILE_PATH);
      $numbers = json_decode($file_json, true);
      foreach($numbers as $digit) {
        echo '<tr>';
        foreach($digit as $value) {
          echo '<td>' . $value . '</td>';
        }
        echo '</tr>';
      } 
    ?>
    </table>
  </main>
</body>
</html>