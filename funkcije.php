<?php

function parNepar($broj) {
  if($broj % 2 === 0) {
    return "paran";
  } else {
    return "neparan";
  }
}

function izracunajSumu($broj) {
  $brojevi = str_split((string)$broj);
  $zbroj = 0;

  foreach($brojevi as $znamenka) {
    $zbroj += (int)$znamenka;
  }
  return $zbroj;
}

function izracunajBrojZnamenki($broj) {
  $broj = abs((int)$broj); 
  return strlen((string)$broj);
} 
