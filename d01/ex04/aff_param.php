#!/usr/bin/php
<?php
if ($argc < 2)
	exit (1);
$i = 0;
foreach ($argv as $value) 
{
	if ($i != 0)
	{
		echo $value;
		echo "\n";
	}
	$i++;
}
?>
