#!/usr/bin/php
<?php
if ($argc < 2)
	exit (1);
$i = 0;
$str = trim($argv[1]);
while ($str[$i])
{
	if ($str[$i] != ' ')
		echo($str[$i]);
	if ($str[$i] == ' ' && $str[$i - 1] != ' ')
		echo(" ");
	$i++;
}
echo "\n";
?>
