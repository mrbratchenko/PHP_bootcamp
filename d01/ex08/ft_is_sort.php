<?php
function ft_split($str)
{
	sort($str);
	foreach ($str as $value) 
	{
		if($value == NULL)
			array_shift($str);	
	}
	return $str;
}

function split_ft($str)
{
	rsort($str);
	foreach ($str as $value) 
	{
		if($value == NULL)
			array_shift($str);	
	}
	return $str;
}

function ft_is_sort($tab)
{
	$compare = ft_split($tab);
	$compare1 = split_ft($tab);
	if ($compare == $tab || $compare1 == $tab)
		return 1;
	else
		return 0;
}
?>
