

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add your appointments/meetings</title>
</head>
<style type="text/css">
.RightBackground {
	background-color: #A1C6EB;
	font-size: medium;
	font-face: arial;
}
</style>
</head>
<body class="RightBackground">

	<img src="../common/images/logo.jpg" width="90" height="65"/>
	<p style="font-size: small; font-face: arial;">
		<span style="position: absolute; bottom: 0pt; center: 10pt; color: black;" >
		 	<?php
		 	date_default_timezone_set("Asia/Calcutta");
		 
			echo "<b>".date('l\, F jS\, Y ')."</b>";
			echo date("H:i:s");
			?>
		</span>
		<span
			style="position: absolute; bottom: 0pt; right: 10pt; color: black;">
			<a href="../about.html" target="right_frame"> <b>home</b></a> 
			| <a href="../contact.html" target="right_frame"> <b>contact</b></a> 
			| <a href="../logout.php" target="_parent"> <b>logout</b>
		</a> </span>
	</p>

	<p style="font-size: xx-large;">
		<span style="position: absolute; top: 0pt; left: 135pt;">
			Web Scheduler </span> </a>
	</p>

</body>
</html>