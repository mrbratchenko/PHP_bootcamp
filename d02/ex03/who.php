#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Kiev');
$who = get_current_user();
$filename = "/var/run/utmpx";
$handle = fopen($filename, "r");
$new = array();
while ($line = fread($handle, 628)) 
{
	$header = unpack("a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad", $line);
	$time = getdate($header[time1]);
	$cut_mon = substr($time[month], 0, 3);
	$name = trim($header[user]);
	$tty = trim($header[line]);
	if ($header[type] == 7)
	{
		echo $name . " " . $tty . "  " . $cut_mon  . "  " . $time[mday] . " " . $time[hours] . ":";
		if ($time[minutes] < 10)
		{
			echo "0" . $time[minutes] . " " . "\n";
		}
		else
		{
			echo $time[minutes] . " " . "\n";
		}
	}
}
fclose($handle);
?>
