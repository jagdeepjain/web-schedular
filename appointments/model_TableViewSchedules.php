<?php

include (realpath(__DIR__.'/../config/includes.php'));


// get the no of pages to display
$page = $_GET['page'];
// get the requested page
$limit= $_GET['rows'];
// get how many rows we want to have into the grid
$sidx = $_GET['sidx'];
// get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction if(!$sidx)
if (!$sidx) {
	$sidx =1;
};

$username=$_SESSION["user"];

//echo $username;

try {
	$db = new MySQL();
	$db->query('SELECT * FROM USER');

	$sql_user_id = "SELECT user_id FROM user WHERE username='". $username . "'";
	$result=mysql_query($sql_user_id);
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	$user_id = $row['user_id'];

	date_default_timezone_set('Asia/Calcutta');

	$result = mysql_query("SELECT COUNT(*) AS count FROM events WHERE user_id =" . $user_id);

	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	$count = $row['count'];

	if( $count >0 ) {
		$total_pages = ceil($count/$limit);
		//$total_pages = floor(($count + $limit - 1)/$limit);
	} else {
		$total_pages = 0;
	}

	if ($page > $total_pages) {
		$page=$total_pages;
	}

	$start = $limit*$page - $limit; // do not put $limit*($page - 1)

	//$sidx $sord LIMIT $start , $limit
	$sql =  "SELECT event_id, title, description, location, start_date, end_date, all_day FROM events WHERE user_id =" . $user_id . " ORDER BY $sidx $sord " . "LIMIT $start , $limit";

	//echo $sql;
	
	$result = mysql_query($sql) or die("Could not execute query." .mysql_error());

	$responce = new stdClass();

	$responce->page = "$page";
	$responce->total = "$total_pages";
	$responce->records = $count;
	$i=0;

	// be sure to put text data in CDATA
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {

		$responce->rows[$i]['id']=$row['event_id'];
		$responce->rows[$i]['cell']=array(
		$row['event_id'],
		$row['title'],
		$row['description'],
		$row['location'],		
		date('Y-m-d H:i',strtotime($row['start_date'])),
		date('Y-m-d H:i',strtotime($row['end_date'])),
		$row['all_day']);
		$i++;
	}
	echo json_encode($responce);
}
catch (Message $e) {
	echo $e->getMessage();
	exit();
}
?>