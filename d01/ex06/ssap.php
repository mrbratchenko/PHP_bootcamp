#!/usr/bin/php
<?php
function ft_split($str)
{
	{
		$str = explode(" ", $str);
		sort($str);
	}
	foreach ($str as $value) 
	{
		if($value == NULL)
			array_shift($str);	
	}
	return $str;
}

if ($argc < 2)
	exit (1);
$new = array();
foreach ($argv as $element)
{
	$sorted = ft_split($element);
	$new = array_merge($new, $sorted);
}
unset($new[0]);
sort($new);
foreach ($new as $value) 
{
	echo $value . "\n";
}
?>