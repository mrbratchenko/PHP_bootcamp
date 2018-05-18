<?php
function ft_split($str)
{
	$str = explode(" ", $str);
	sort($str);
	foreach ($str as $value) 
	{
		if($value == NULL)
			array_shift($str);	
	}
	return $str;
}
?>
