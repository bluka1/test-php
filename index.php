<?php
  require 'funkcije.php';
  define('FILE_PATH', 'numbers.json');
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
  <h1>Test php</h1>
  <hr>
  <main class="main">
    <form action="obrada.php" method="POST">
        <label>Upišite broj:
            <input type="number" name="broj" required>
        </label>
        <br>
        <br>
        <input type="submit" value="Pošalji">
    </form>
    <table border="1" cellpadding="5" cellspacing="0">         
        <tr>
            <th>Broj</th>
            <th>Par/Nepar</th>
            <th>Suma znamenki</th>
            <th>Broj znamenki</th>            
        </tr>
        <?php
            $file_json = file_get_contents(FILE_PATH, true);
            $brojevi = json_decode($file_json, true);
            foreach ($brojevi as $broj) {
                echo "<tr>";
                echo "<td>" . $broj['broj'] . "</td>";
                echo "<td>" . paranNeparan($broj['broj']) . "</td>";
                echo "<td>" . sumaZnamenki($broj['broj']) . "</td>";
                echo "<td>" . brojZnamenki($broj['broj']) . "</td>";
                echo "</tr>";
            }
        ?>              
    </table>
  </main>
</body>
</html>