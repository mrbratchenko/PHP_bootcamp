#!/usr/bin/php
<?php
if ($argc < 2)
	exit (1);
$str = explode(" ", $argv[1]);
$splitted = array_slice(array_filter($str), 0);
$i = 0;
foreach ($splitted as $value) 
{
	if ($i != 0)
		echo $value . " ";
	$i++;
}
echo $splitted[0] . "\n";
?>