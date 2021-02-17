<?php

$word = "abracadabra";
$wrongLetters = [];
$goodLetters = [];
$guessed = false;

foreach(str_split($word) as $letter) {
  if (in_array($letter, $goodLetters)) {
    echo "$letter ";
  } else {
    $allLetters = false;
    echo "_ ";
  }
}
echo "\n";

while (!$guessed && count($wrongLetters) < 5) {
  echo "\n";
  $guess = readline("Entrez une lettre : ");

  echo "\n\n";

  if (strpos($word, $guess) === false) {
    if (!in_array($guess, $wrongLetters)) {
      $wrongLetters[] = $guess;
    }
  } else {
    if (!in_array($guess, $goodLetters)) {
      $goodLetters[] = $guess;
    }
  }

  $allLetters = true;
  foreach(str_split($word) as $letter) {
    if (in_array($letter, $goodLetters)) {
      echo "$letter ";
    } else {
      $allLetters = false;
      echo "_ ";
    }
  }
  echo "\n";

  if (count($wrongLetters)) {
    echo "\n[";
    echo implode(",", $wrongLetters);
    echo "]\n";
  }

  if ($allLetters) {
    $guessed = true;
  }
}

if (count($wrongLetters) == 5) {
  echo "\nPerdu !\n";
}
if ($guessed) {
  echo "\nGagné !\n";
}
