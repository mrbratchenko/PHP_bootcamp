SELECT id_sub AS 'nb_susc', floor(avg(price)) AS 'av_susc', mod(sum(duration_sub), 42) AS 'ft'
	FROM subscription
	GROUP BY id_sub;