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
  <main class="main">
    <!-- ovdje dodajte formu i tablicu -->

    <?php
// Putanja do JSON datoteke
$jsonFile = 'numbers.json';

// Učitaj postojeće podatke
$data = [];
if (file_exists($jsonFile)) {
    $content = file_get_contents($jsonFile);
    $data = json_decode($content, true) ?? [];
}

// Obrada forme
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['number'] ?? null;

    // Validacija unosa
    if ($input !== null && is_numeric($input) && intval($input) == $input) {
        $number = (int)$input;

        // --- Analiza broja ---
        $parnost = ($number % 2 === 0) ? 'paran' : 'neparan';
        $znamenke = str_split((string) abs($number));
        $suma = array_sum($znamenke);
        $brojZnamenki = count($znamenke);

        // Dodaj u podatke
        $entry = [
            'broj' => $number,
            'parnost' => $parnost,
            'suma' => $suma,
            'znamenke' => $brojZnamenki
        ];

        $data[] = $entry;

        // Spremi u JSON
        file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));

        // Refresh za sprječavanje duplog slanja
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $error = "Molimo unesite cijeli broj.";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Analiza broja</title>
    <style>
        body { font-family: Arial; display: flex; padding: 20px; }
        .form-container, .table-container { width: 50%; padding: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .error { color: red; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Unesite broj</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="post">
        <input type="number" name="number" required>
        <br><br>
        <input type="submit" value="Analiziraj">
    </form>
</div>

<div class="table-container">
    <h2>Rezultati</h2>
    <?php if (!empty($data)): ?>
        <table>
            <tr>
                <th>Broj</th>
                <th>Par/Nepar</th>
                <th>Suma cifara</th>
                <th>Broj cifara</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['broj']) ?></td>
                    <td><?= htmlspecialchars($row['parnost']) ?></td>
                    <td><?= htmlspecialchars($row['suma']) ?></td>
                    <td><?= htmlspecialchars($row['znamenke']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Još nema unosa.</p>
    <?php endif; ?>


  </main>
</body>
</html>