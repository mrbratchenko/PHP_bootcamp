#!/usr/bin/php
<?php
function replace($match)
{
	$upper = strtoupper($match[1]);
	$match[0] = str_replace($match[1], $upper, $match[0]);
  	return $match[0];
}

function find_link($match)
{
	$pattern = '/>(.+)</Us';
	$match[0] = preg_replace_callback($pattern, "replace", $match[0]);
	return $match[0];
}

if ($argc < 2)
	exit (1);

if (!$line = file_get_contents($argv[1]))
{
	echo "an error occured\n";
	exit (1);
}

$pattern1 = '/<a[^>]+>.*<\/a>/Us';
$pattern2 = '/title=\"(.+)\"/i';

$line = preg_replace_callback($pattern1, "find_link", $line);
$line = preg_replace_callback($pattern2, "replace", $line);
echo $line;
?>
