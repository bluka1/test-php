<?php
function cijeliBroj($broj)
{
    if (is_numeric($broj)) {
        return floor($broj);
    } else {
        return "Nije broj";
    }
}



function parIliNepar($broj)
{
    if (is_numeric($broj)) {
        if ($broj % 2 == 0) {
            return "Paran";
        } else {
            return "Neparan";
        }
    } else {
        return "Nije broj";
    }
}

function zbrojiSveZnamenke($broj)
{
    if (is_numeric($broj)) {
        // Uklanjamo minus i decimalnu točku
        $clanovi = str_split(str_replace(['-', '.'], '', (string) $broj));
        return array_sum($clanovi);
    } else {
        return "Nije broj";
    }
}

function izracunajBrojZnamenki($broj)
{
    if (is_numeric($broj)) {
        $brojZnamenki = abs($broj);
        return strlen((string) $brojZnamenki);
    } else {
        return "Nije broj";
    }
}
?>