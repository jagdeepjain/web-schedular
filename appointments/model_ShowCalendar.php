<?php

include (realpath(__DIR__.'/../config/includes.php'));

$username= $_SESSION["user"];

try {
	$db = new MySQL();
	$db->query('SELECT * FROM USER');

	$sql_user_id = "SELECT user_id FROM user WHERE username='". $username . "'";
	//echo  $sql_user_id;
	
	$result=mysql_query($sql_user_id);
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	$user_id = $row['user_id'];

	$sql_data = "SELECT event_id, title, start_date, end_date, all_day FROM events WHERE user_id =" . $user_id;
	//echo $sql_data;
	
	$result = mysql_query($sql_data);
	//echo $result;

	date_default_timezone_set('Asia/Calcutta');

	// Initializes a container array for all of the calendar events
	$jsonArray = array();

	while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$id = $row['event_id'];
		$title = $row['title'];

		$all_day=$row['all_day'];

		//Is event all day?
		if ($all_day==1)
		{
			$allDay='true';
			$start = $row['start_date'];
			$buildjson = array('id' => $id, 'title' => "$title", 'start' => "$start", 'allDay' => true, 'textColor' => "white", 'color' => "blue");
		} else {
			$allDay='false';
			$start = $row['start_date'];
			$end = $row['end_date'];
			
			$buildjson = array('id' => $id, 'title' => "$title", 'start' => "$start", 'end' => "$end", 'allDay' => false, 'textColor' => "white", 'color' => "green");
		};

	array_push($jsonArray, $buildjson);
	// Output the json formatted data so that the jQuery call can read it
		
	}
	echo json_encode($jsonArray);

} catch(Message $e) {
	echo $e->getMessage();
	exit();
}
?>
