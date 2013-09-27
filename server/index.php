<?php
	include "auth.inc";
	include "tools.inc";
	connect();

	$result = mysql_query("SELECT sum(count) as count, sum(time) as time, sum(peter) as peter, sum(colin) as colin from dice");
	show_table($result, false);

	$result = mysql_query("SELECT * from dice ORDER BY timestamp DESC LIMIT 1000");
	show_table($result, true);
?>
