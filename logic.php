<?php


$words = array("foo", "bar", "hello", "world", "Eliot", "Liz", "Max", "up", "down", "around");

$arrlength = 0;

$arrlength = (int)$_GET['numWords'];

echo "Array length is ".$arrlength .".<br>";

$rand_keys = array_rand($words, $arrlength);

?>
