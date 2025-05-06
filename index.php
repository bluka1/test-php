<?php

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
require('funkcije.php');
define('FILE_PATH', 'numbers.json');
?>

  <main class="main">
    <form action="obrada.php" method="POST">
      <label>Upišite broj:
        <br>
        <input type="text" name="brojevi" required>
      </label>
      <br><br>
      <input type="submit" value="Pošalji">
    </form>

    <table border="1">
      <tr>
        <th>Broj</th>
        <th>Par/Nepar</th>
        <th>Suma znamenki</th>
        <th>Broj znamenki</th>
      </tr>

    <?php 
    $containsJson = file_get_contents(FILE_PATH);
    $jsonBrojevi = json_decode($containsJson);
    foreach($jsonBrojevi as $brojevi) {
      echo "<tr>";
      foreach($brojevi as $vrijednosti) {
        echo "<td>" . $vrijednosti . "</td>";
      }
      echo "</tr>";
    }


    ?>

    </table>


  </main>
</body>
</html>