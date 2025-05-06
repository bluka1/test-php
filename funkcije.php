<?php
function provjeriParnost($broj) {
    return $broj % 2 === 0 ? "paran " : "neparan ";
}

function sumaSvihZnamenki($broj) {
    $broj = abs($broj);
    $znamenke = str_split((string)$broj);
    return array_sum($znamenke);
}

function brojZnamenki($broj) {
    return strlen((string)abs($broj));
}

