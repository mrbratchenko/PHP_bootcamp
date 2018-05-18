SELECT abs(datediff(max(last_projection), (min(last_projection)))) AS 'uptime'
	FROM film;