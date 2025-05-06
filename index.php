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
    <form action="obrada.php" method="POST">
        <label>Unesite cijeli broj:
            <input type="number" name="broj" required>
        </label>
        <br><br>
        <input type="submit" value="Analiziraj broj">
    </form>

    <!-- tablica -->
    <table border="1">
        <tr>
            <th>Broj</th>
            <th>Par/Nepar</th>
            <th>Suma znamenki</th>
            <th>Broj znamenki</th>
        </tr>

        <?php
    $file_json = file_get_contents('numbers.json');
    $numbers = json_decode($file_json, true);

    foreach ($numbers as $number) {
        echo '<tr>';
        echo '<td>' . $number['broj'] . '</td>';
        echo '<td>' . $number['parnost'] . '</td>';
        echo '<td>' . $number['suma'] . '</td>';
        echo '<td>' . $number['znamenke'] . '</td>';
        echo '</tr>';
    }
    ?>
    </table>

  </main>
</body>
</html>