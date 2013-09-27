<?php
	include "auth.inc";
	include "tools.inc";
	connect();
	$result = mysql_query("SELECT * from dice ORDER BY timestamp DESC LIMIT 1000");
	show_table($result);
?>
