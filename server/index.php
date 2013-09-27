<?php
	include "auth.inc";
	include "tools.inc";
	connect();

	echo "Result:\n";
	$result = mysql_query("SELECT sum(peter)/sum(count) as peter_win_probability from dice");
	show_table($result, false);

	echo "<br>\n";
	echo "Total values:\n";
	$result = mysql_query("SELECT sum(count) as count, sum(time) as time, sum(peter) as peter, sum(colin) as colin from dice");
	show_table($result, false);

	echo "<br>\n";
	echo "Last 1000 tasks:\n";
	$result = mysql_query("SELECT * from dice ORDER BY timestamp DESC LIMIT 1000");
	show_table($result, true);
?>
