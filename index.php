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
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin: 0 20px;
      }

      form {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }

      .tablica {
        margin: 0;
        margin-left: 10px;
        border-collapse: collapse;
        border: 2px double black;
        width: 50%;
        /* Tablica zauzima desnu polovicu ekrana */
      }

      .tablica td,
      .tablica th {
        border: 1px solid black;
        padding: 5px;
      }
    </style>



  </head>

  <body>
    <?php
    define('FILE_PATH', 'numbers.json');
    require 'funkcije.php';
    ?>
    <main class="main">
      <!-- ovdje dodajte formu i tablicu -->

      <!-- forma -->

      <form action="akcije.php" method="post">
        <label for="broj">Unesite broj:</label>
        <input type="text" id="broj" name="broj" required>
        <input type="submit" value="Odradi">
      </form>
      <!-- tablica -->
      <table class="tablica">
        <tr>
          <th>Broj</th>
          <th>Par/Nepar</th>
          <th>Sumiranje cifri</th>
          <th>Broj cifri</th>
        </tr>
        <tbody>
          <?php

          // učitavam podatke iz json datoteke
          if (file_exists(FILE_PATH)) {

            $podaci = json_decode(file_get_contents(FILE_PATH), true);
            foreach ($podaci as $red) {
              echo "<tr>";
              // echo "<td>" . htmlspecialchars($red['broj']) . "</td>";
              // echo "<td>" . htmlspecialchars($red['parnost']) . "</td>";
              // echo "<td>" . htmlspecialchars($red['suma']) . "</td>";
              // echo "<td>" . htmlspecialchars($red['znamenke']) . "</td>";
              foreach ($red as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
              }
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='4'>Nema podataka</td></tr>";
          }
          ?>
      </table>

    </main>
  </body>

</html>