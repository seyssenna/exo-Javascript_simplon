<?php

$word = "tout";
$splitWord = str_split($word); // ["t", "o", "u", "t"]

// créer un tableau qui contient un "_" par lettre du mot à deviner
$bars = [];
for ($i = 0; $i < count($splitWord); $i++) {
  $bars[] = "_";
}

echo implode(" ", $bars);
echo "\n\n";

$fail = [];

// tant que le joueur n'a ni gagné, ni perdu, on joue
while (implode($bars) !== $word && count($fail) < 4) {
  // on récupère la lettre proposée par le joueur
  $guessedLetter = readline("Entrez une lettre : ");

  // si la lettre proposée est dans le mot à deviner
  // on remplace les "_" par cette lettre
  if (in_array($guessedLetter, $splitWord) === true) {
    $positions = array_keys($splitWord, $guessedLetter);
    foreach ($positions as $position) {
      $bars[$position] = $guessedLetter;
    }
    echo implode(" ", $bars);
    echo "\n";
  } else {
    // si le joueur propose deux fois la même lettre, on ne
    // compte qu'une seule erreur
    if (!in_array($guessedLetter, $fail)) {
      $fail[] = $guessedLetter;
    }
    echo implode(";", $fail);
    echo "\n";
  }
}

// si le joueur a gagné on affiche "gagné", sinon "perdu"
if(implode($bars) === $word) {
  echo "Gagné !\n";
} else {
  echo "Perdu !\n";
}
