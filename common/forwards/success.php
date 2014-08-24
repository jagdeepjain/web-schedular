<!--?php
session_start();
//check to see if user has logged in with a valid password
if ($_SESSION['authuser'] != 1) {
	echo "Sorry, but you don't have permission to view this page.";
	exit();
}
?-->
