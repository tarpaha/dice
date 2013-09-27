<?php
	function show_table($sql_query_result)
	{
		$fields_num = mysql_num_fields($sql_query_result);

		echo "<table border='1' width='100%'><tr>";
		for($i=0; $i<$fields_num; $i++)
		{
			$field = mysql_fetch_field($sql_query_result);
			echo "<td>{$field->name}</td>";
		}
		echo "</tr>\n";

		while($row = mysql_fetch_row($sql_query_result))
		{
			echo "<tr>";

			foreach($row as $cell)
				echo "<td>$cell</td>";

			echo "</tr>\n";
		}
	}
?>
