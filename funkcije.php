<?php
    function paranNeparan($number) {
        return $number % 2 === 0 ? 'Paran' : 'Neparan';
    }

    function sumaZnamenki($number) {
        return array_sum(str_split((string)$number));
    }

    function brojZnamenki($number) {
        return strlen((string)$number);
    }   
?>