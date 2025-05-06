<?php
function cijeliBroj($broj)
{
    if (ctype_digit($broj)) {
        return $broj;
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
        if (is_array($broj)) {
            return array_sum($broj);
        } else {
            return "Nije niz";
        }
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