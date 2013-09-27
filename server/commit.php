<?php
	include "auth.inc";
	connect();

	$uuid  = $_GET["uuid"];
	$count = $_GET["count"];
	$time  = $_GET["time"];
	$peter = $_GET["peter"];
	$colin = $_GET["colin"];

	mysql_query("
		INSERT
		INTO dice (uuid, count, time, peter, colin)
		VALUES('$uuid','$count','$time','$peter','$colin')")
	or die(mysql_error());

	echo "ok";
?>
