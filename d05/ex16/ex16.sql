SELECT count(*) AS 'movies'
	FROM member_history
	WHERE date(`date`) BETWEEN '2006-30-10' AND '2007-27-07' OR month(`date`) = 12 AND day(`date`) = 24;