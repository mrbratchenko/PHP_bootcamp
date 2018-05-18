#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
if ($argc < 2)
	exit (1);
$i = 0;
$splitted = preg_split('/ /', $argv[1]);
if ((!preg_match('#\b([L,l]undi|[M,m]ardi|[M,m]ercredi|[J,j]eudi|[V,v]endredi|[S,s]amedi|[D,d]imanche)\b#', $splitted[0])) || (!preg_match('/\d{1,31}/', $splitted[1])) || (!preg_match('#\b([J,j]anvier|[F,f]evrier|[A,a]vril|[M,m]ai|[J,j]uin|[J,j]uillet|[A,a]out|[S,s]eptembre|[O,o]ctobre|[N,n]ovembre|[D,d]ecembre)\b#', $splitted[2])) || (!preg_match('/(19[7-9][0-9]|200[0-9]|201[0-8])/', $splitted[3])) || (!preg_match("#^[0-9]{4}$#", $splitted[3])) || (!preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/', $splitted[4])))
{
	echo "Wrong Format\n";
	exit (1);
}
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
$fr_days = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche',];
$key = array_search($splitted[0], $fr_days);
$daytocomp = $days[$key];
unset($splitted[0]);
$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
$fr_months = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre', 'janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre'];
$key = array_search($splitted[2], $fr_months);
$splitted[2] = $months[$key];
$joined = implode($splitted);
$seconds = strtotime($joined);
$tocompare = getdate($seconds);
if ($tocompare[weekday] != $daytocomp || $tocompare[mday] != $splitted[1] || $tocompare[year] != $splitted[3] || $tocompare[month] != $splitted[2])
{
	echo "Wrong Format\n";
	exit (1);
}
else
	echo strtotime($joined) . "\n";
?>
