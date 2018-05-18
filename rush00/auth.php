<?php
function auth($username, $password) {
	$array = unserialize(file_get_contents('private/bd'));
	if ($array != NULL) {
		foreach ($array as $elem) {
			if ($elem['username'] == $username &&
				$elem['password'] == hash('whirlpool', $password)) {
				return TRUE;
				}
			}
		}
	return FALSE;
}
?>