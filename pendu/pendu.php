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
  $guess = readline("Entrez une lettre : ");

  if (strpos($word, $guess) === false) {
    if (!in_array($guess, $wrongLetters)) {
      $wrongLetters[] = $guess;
    }
  } else {
    if (!in_array($guess, $goodLetters)) {
      $goodLetters[] = $guess;
    }
  }

  echo "\nmauvaises lettres : ";
  foreach($wrongLetters as $wrongLetter) {
    echo "$wrongLetter ";
  }
  echo "\n";

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

  if ($allLetters) {
    $guessed = true;
  }
}

if (count($wrongLetters) == 5) {
  echo "Perdu !\n";
}
if ($guessed) {
  echo "Gagné !\n";
}
