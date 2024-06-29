<?php

function calculFacture($cons)
{
  return match (true) {
    $cons > 0 && $cons <= 50 => $cons * 200,
    $cons <= 150 => $cons * 300,
    $cons <= 350 => $cons * 400,
    default => $cons * 500
  };
}
