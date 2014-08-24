<?php include (realpath(__DIR__.'/../config/includes.php'));


try {
	$db = new MySQL();
	$db->query('SELECT * FROM USER');

	//Getting the todays date for putting as edit_date of record.
	$sql_date = "SELECT CURDATE()";
	$result = mysql_query($sql_date) or die('Error: ' . mysql_error());
	$row = mysql_fetch_array($result);
	$date = $row[0];
	
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];

	$sql= "UPDATE events SET " .
			"title			='" . $_POST['title'] . "'," .
			"description	='" . $_POST['description'] . "'," .
			"location		='" . $_POST['location'] . "'," .
			"start_date		= STR_TO_DATE('" . $start_date . "','%Y-%m-%d %H:%i')," .
			"end_date		= STR_TO_DATE('" . $end_date . "','%Y-%m-%d %H:%i') " .
	
			"WHERE event_id =" . $_POST['id'];
	echo $sql;
	
	if (!mysql_query($sql))
	{
		die('Error: ' . mysql_error());
	}

} catch (Meesage $e) {
	echo $e->getMessage();
	exit();
}


?>
