<?php

$numbersJson = file_get_contents('numbers.json');
$numbersArray = json_decode($numbersJson, true);
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
    <form action="numbersProcessor.php" method="post">
        <label for="cijelibroj">Unesite broj:</label>
        <input type="number" id="cijelibroj" name="cijelibroj" min="0" required>
        <button type="submit">Posaljite</button>
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
        foreach ($numbersArray as $number) {
            $enteredNumber = $number['broj'];
            $evenOrOdd = $number['parnost'];
            $sum = $number['suma'];
            $digits = $number['znamenke'];

            echo "<tr>
                    <td>$enteredNumber</td>
                    <td>$evenOrOdd</td>
                    <td>$sum</td>
                    <td>$digits</td>
                   </tr>";
        }

        ?>
    </table>

  </main>
</body>
</html>