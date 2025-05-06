<?php
    require 'funkcije.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST) && isset($_POST['broj'])) { 
        $broj = $_POST['broj'];
        if (filter_var($broj, FILTER_VALIDATE_INT) == false) {
            echo "Uneseni broj nije cijeli broj.";
            exit;
        }  
        if ($broj < 0) {
            echo "Uneseni broj ne smije biti negativan.";
            exit;
        }
        $file_json = file_get_contents('numbers.json', true);
        $brojevi = json_decode($file_json, true); 
        $brojevi[] = [
            'broj' => $broj,
            'parnost' => paranNeparan($broj),
            'suma' => sumaZnamenki($broj),
            'znamenke' => brojZnamenki($broj)
        ];

        file_put_contents('numbers.json', json_encode($brojevi, JSON_PRETTY_PRINT));
        header("Location: index.php");
    } else {
        echo "Niste poslali podatke.";
    }    
?>