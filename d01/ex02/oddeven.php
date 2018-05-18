#!/usr/bin/php
<?php
echo "Enter a number: ";
while (1)
{
	$line = trim(fgets(STDIN));
	if (feof(STDIN))
	{
		echo "\n";
		exit(1);
	}
	else if (!(is_numeric($line)))
	{
		echo "'$line' is not a number\n";
		echo "Enter a number: ";
	}
	else if ($line % 2 == 0)
	{
		echo "The number $line is even\n";
		echo "Enter a number: ";
	}
	else
	{
		echo "The number $line is odd\n";
		echo "Enter a number: ";
	}	
}
?>
