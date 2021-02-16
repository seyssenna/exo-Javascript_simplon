<?php

$word = "tout";
$splitWord = str_split($word);
$bars = [];

for ($i = 0; $i < count($splitWord); $i++) {
  $bars[] = "_";
}

echo implode(" ", $bars);
echo "\n\n";

// bars <- ["t", " ", "o", " ", "u", " ", "t"]
// splitWord <- ["t", "o", "u", "t"]
// word <- "tout"
// implode("", $bars) <- "t o u t"
while (implode($bars) !== $word) {
  $guessedLetter = readline("Entrez une lettre : ");

  if (in_array($guessedLetter, $splitWord) === true) {
    $positions = array_keys($splitWord, $guessedLetter);
    foreach ($positions as $position) {
      $bars[$position] = $guessedLetter;
    }
    echo implode($bars, " ");
    echo "\n";
  } else {
    echo "non\n";
  }
}
