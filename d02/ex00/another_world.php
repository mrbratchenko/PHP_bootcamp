#!/usr/bin/php
<?php
	if ($argc < 2)
		exit (1);
	$i = 0;
	$string = trim($argv[1]);
	$pattern = '/\s+/';
	$replacement = ' ';
	echo preg_replace($pattern, $replacement, $string);
	echo "\n";
?>