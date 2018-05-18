#!/usr/bin/php
<?php
if ($argc < 2)
	exit (1);

$homepage = file_get_contents($argv[1]);
if (!strncmp("http://", $argv[1], 7))
	$name = substr($argv[1], 7);
else if (!strncmp("https://", $argv[1], 8))
	$name = substr($argv[1], 8);

mkdir("$name", 0777);

preg_match_all("/<img src=\"(.*?)\"/", $homepage, $matches);

foreach ($matches[1] as $value) 
{
	if (!filter_var($value, FILTER_VALIDATE_URL))
	{
		$value = $argv[1] . $value;
	}
	$cut_name = strrchr($value, "/");
	$cut_name = substr($cut_name, 1);
	$path = "./" . $name . "/" . $cut_name;
	$ch = curl_init($value);
	$fp = fopen($path, 'wb');
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);
}
?>