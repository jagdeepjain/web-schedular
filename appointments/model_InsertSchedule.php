<?php include (realpath(__DIR__.'/../config/includes.php'));?>

<?php

$type = 'appointment';

$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$title = $_POST['title'];

$username= $_SESSION["user"];

$user_id = "";
//echo $username;


$all_day=$_POST['all_day'];

try {
	$db = new MySQL();

	$sql_user_id = "SELECT user_id FROM user WHERE username='". $username . "'";
	$result=mysql_query($sql_user_id);
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	$user_id = $row['user_id'];



	if ($all_day==1) {
		//$end=null;
		$sql= "INSERT INTO events (user_id, start_date, end_date, title, description, location) " .
			"VALUES (" . 
		$user_id . "," .
			"STR_TO_DATE('" . $start_date . "','%Y-%m-%d %H:%i') " . ",'" . 
		$_POST['title'] . "','" .
		$_POST['description'] . "','" .
		$_POST['location'] . "')";
		echo $sql;
	} else {
		$sql= "INSERT INTO events (user_id, start_date, end_date, title, description, location) " .
			"VALUES (" . 
		$user_id . "," .
			"STR_TO_DATE('" . $start_date . "','%Y-%m-%d %H:%i') " . ", " . 
			"STR_TO_DATE('" . $end_date . "','%Y-%m-%d %H:%i') " . ",'" . 
		$_POST['title'] . "','" .
		$_POST['description'] . "','" .
		$_POST['location'] . "')";

		echo $sql;
	}
	
	if (!mysql_query($sql))
	{
		die('Error: ' . mysql_error());
	} else {
		mysql_close($con);
		header("Location: ../common/forwards/show_auto_id.php?title=" . $title . "&start=" . $start_date . "&end=" . $end_date . "&type=" . $type . "");
	}
	
}
catch (Message $e) {
	echo $e->getMessage();
	exit();
}

?>