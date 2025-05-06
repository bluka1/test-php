<?php

function odrediParnost(int $broj): string {
    return $broj % 2 === 0 ? 'paran' : 'neparan';
}

function izracunajSumuZnamenki(int $broj): int {
    $znamenke = str_split((string)abs($broj));
    return array_sum($znamenke);
}

function izracunajBrojZnamenki(int $broj): int {
    return strlen((string)abs($broj));
}
