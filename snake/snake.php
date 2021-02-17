<?php

stream_set_blocking(STDIN, false);

$width = 60;
$height = 20;

$x= 30;
$y = 4;

$map = [];

for($i = 0; $i < $height; $i++) {
  for($j = 0; $j < $width; $j++) {
    $map[$i][$j] = " ";
  }
}
for($i = 0; $i < $width; $i++) {
  $map[0][$i] = getSpecialCharacter(2550);
  $map[$height - 1][$i] = getSpecialCharacter(2550);
}
for($i = 0; $i < $width; $i++) {
  $map[$i][0] = getSpecialCharacter(2551);
  $map[$i][$width - 1] = getSpecialCharacter(2551);
}
$map[0][0] = getSpecialCharacter(2554);
$map[0][$width - 1] = getSpecialCharacter(2557);
$map[$height - 1][0] = getSpecialCharacter("255a");
$map[$height - 1][$width - 1] = getSpecialCharacter("255d");

$previousChar = $map[$y][$x];

$direction = "RIGHT";

while(true) {
  fwrite(STDOUT, "\033[0;0f"); // move cursor to start
  for($i = 0; $i < $height; $i++) {
    for($j = 0; $j < $width; $j++) {
        fwrite(STDOUT, $map[$i][$j]);
    }
    fwrite(STDOUT, PHP_EOL);
  }

  usleep(60000);

  $input = readInput();
  switch($input) {
    case "z":
      $direction = "UP";
      break;
    case "q":
      $direction = "LEFT";
      break;
    case "d":
      $direction = "RIGHT";
      break;
    case "s":
      $direction = "DOWN";
      break;
  }

  $map[$y][$x] = $previousChar;
  switch($direction) {
    case "UP":
      $y = $y - 1;
      break;
    case "LEFT":
      $x = $x - 1;
      break;
    case "RIGHT":
      $x = $x + 1;
      break;
    case "DOWN":
      $y = $y + 1;
      break;
  }
  $previousChar = $map[$y][$x];
  $map[$y][$x] = "#";
}

function getSpecialCharacter($code) {
  return html_entity_decode(sprintf('&#x%s;', $code), ENT_NOQUOTES, 'UTF-8');
}

function readInput() {
  readline_callback_handler_install('', function () {});
  $char = stream_get_contents(STDIN, 1);
  readline_callback_handler_remove();

  return $char;
}
