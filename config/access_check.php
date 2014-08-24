<?php 

session_start(); 

include ('defines.php');
include ('mysql.class.php');
$app_base_path =  APP_BASE_PATH;

// Define $myusername and $mypassword
$user=$_POST['myusername'];
$pass=$_POST['mypassword'];

echo $user . $pass;
echo "<BR>";

// To protect MySQL injection
$user = stripslashes($user);
//$user = mysql_real_escape_string($user);
$pass = stripslashes($pass);
//$pass = mysql_real_escape_string($pass);

$sql = "SELECT * FROM user WHERE username='" .$user . "' and password='" . $pass . "'";

try {

	$db = new MySQL();

	$result=mysql_query($sql);

	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1) {

		$_SESSION["user"] = $user;
		$_SESSION["pass"] = $pass;

		//redirect to file "session_check.php"
		header("Location: session_check.php");
	}
	else {
		echo "Something goes wrong; ";
		echo "either your username is not present in our database ";
		echo "or your password is wrong, ";
		echo "please contact administrator !";
	}
	ob_end_flush();

} catch (Exception $e) {
	echo $e->getMessage();
	exit();
}

?>
