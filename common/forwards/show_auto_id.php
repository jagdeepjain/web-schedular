<?php include (realpath(__DIR__.'/../config/includes.php'));?>


<?php
date_default_timezone_set("Asia/Calcutta");

$type			=	$_GET['type'];
$title			=	$_GET['title'];
$start			=	$_GET['start'];
$end			=	$_GET['end'];
$username		=	$_GET['username'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
body {
	font-size: 90%;
}

label {
	display: inline-block;
	width: 100px;
}

legend {
	padding: 0.5em;
}

fieldset fieldset label {
	display: block;
}

#show_results {
	width: 500px;
}

#show_results label {
	width: 250px;
}
</style>
</head>
<body>
	<script src="http://code.jquery.com/ui/jquery-ui-git.js"></script>
	<form class="cmxform" id="show_results">
		<fieldset class="ui-widget ui-widget-content ui-corner-all">
			<!--legend class="ui-widget ui-widget-header ui-corner-all">Add client details</legend-->
		<?php
		switch ($type)
		{
			case "newuser":
				{
					echo "<p>";
					echo "User with user name as ";
					echo "<b> " . $username . " " ;
					echo "</b>";
					echo " is added to the system";
					echo "</p>";

					break;
				}
			case "appointment":
				{
					echo "<p>";
					echo "Appointment : <b> ";
					echo $title ;
					echo " </b> starting from ";
					echo " <b> ";
					echo date('F j, Y, g:i a', strtotime($start));
					echo " </b> and ending at ";
					echo "<b> ";
					echo date('F j, Y, g:i a', strtotime($end));
					echo " </b> is saved in your in calender, ";
					echo "take a look now.";
					echo "</p>";
					break;
				}
			
					
			default:
				echo "Thanks for adding information.";
		}
		?>

		</fieldset>
	</form>
</body>
</html>
