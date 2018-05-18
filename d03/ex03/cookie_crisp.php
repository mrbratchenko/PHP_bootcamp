<?php
foreach($_GET as $key => $value)
{
	if ($key == "action")
	{
		if ($value == "set")
		{
			setcookie($_GET[name], $_GET[value], time()+3600);
		}
		if ($value == "get")
		{
			if ($_COOKIE[$_GET[name]])
				echo $_COOKIE[$_GET[name]] . "\n";
		}
		if ($value == "del")
		{
			setcookie($_GET[name], "", time()-3600);
		}	
	}
	else
	{
		exit(1);
	}
}
?>