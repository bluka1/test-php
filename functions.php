<?php

function ProvjeraParNepar($broj){
    if($broj % 2 == 0){
        return "Da";
    }else{
        return "Ne";
    }       
}

function SumaZnamenki($broj){
    $numbers = ((int) $broj);
    $sum = 0;
    while($numbers > 0){
        $sum += $broj % 10;
        $broj = (int)($broj / 10);
    }
    return $sum;
}
function BrojZnamenki($broj){
    return strlen($broj);
}

