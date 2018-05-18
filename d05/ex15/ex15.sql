SELECT reverse(trim(leading '0' FROM phone_number)) AS 'rebmunenohp'
	FROM distrib
	WHERE phone_number LIKE '05%';