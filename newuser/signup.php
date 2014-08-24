<?php
session_start();
include (realpath(__DIR__.'/../config/mysql.class.php'));
?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; ccharset=UTF-8" />
<title>User Sign Up Form</title>

<link rel="stylesheet" type="text/css" media="screen"
	href="../common/external/jquery-ui-git/jquery-ui-git.css" />
<script
	src="../common/external/jquery-ui/development-bundle/jquery-1.8.2.js"
	type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="screen"
	href="../common/external/jquery-ui/development-bundle/themes/smoothness/jquery.ui.datepicker.css" />
<script
	src="../common/external/jquery-ui/development-bundle/ui/jquery.ui.datepicker.js"
	type="text/javascript"></script>

<link rel="stylesheet" type="text/css" media="screen"
	href="../common/external/jquery-ui/css/smoothness/jquery-ui-1.9.1.custom.css" />
<link rel="stylesheet" type="text/css" media="screen"
	href="../common/external/jqGrid/css/ui.jqgrid.css" />
<link rel="stylesheet" type="text/css" media="screen"
	href="../common/external/jquery-ui/development-bundle/themes/smoothness/jquery.ui.datepicker.css" />

<script
	src="../common/external/jquery-ui/js/jquery-ui-1.9.1.custom.min.js"
	type="text/javascript"></script>
<script
	src="../common/external/jquery-ui/development-bundle/ui/jquery.ui.datepicker.js"
	type="text/javascript"></script>
<script src="../common/external/jqGrid/js/jquery-1.4.2.min.js"
	type="text/javascript"></script>
<script
	src="../common/external/jquery-ui/development-bundle/jquery-1.8.2.js"
	type="text/javascript"></script>

<script src="../common/external/google-jquery/jquery.min.js"
	type="text/javascript"></script>
<script src="../common/external/google-jquery/jquery-ui.min.js"
	type="text/javascript"></script>

<!--  Date Picker -->
<!-- 
<link rel="stylesheet" href="../common/external/code-jquery/jquery-ui.css" />
<script src="../common/external/code-jquery/jquery-1.8.3.js"></script>
<script src="../common/external/code-jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />

-->
<script type="text/javascript">
    $(function() {
        $( "#datepicker1" ).datepicker({dateFormat:'yy-mm-dd'});
        $( "#datepicker2" ).datepicker({dateFormat:'yy-mm-dd'});
    });
</script>

<style type="text/css">
body {
	font-size: 62.5%;
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

#signupform {
	width: 375px;
}

#signupform label {
	width: 175px;
}

#signupform label.error,#signupform button.submit {
	margin-left: 175px;
}

#newsletter_topics label.error {
	display: none;
	margin-left: 103px;
}
</style>

<?php



/** Validate captcha */
if (!empty($_REQUEST['captcha'])) {
	if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
		$captcha_message = "Invalid captcha";
		$style = "background-color: #FF606C; width: 375px;";
	} else {
		$captcha_message = "Valid captcha";
		$style = "background-color: #CCFF99; width: 375px;";
			
		try {
			$db = new MySQL();

			if (isset($_POST['Submit'])) {
				$sql_check_username="SELECT username FROM user WHERE username = '" . $_POST['user_name'] ."'" ;
				$sql_check_email="SELECT email FROM user WHERE email = '" . $_POST['email'] ."'" ;
				if ((mysql_num_rows(mysql_query($sql_check_username)) >= 1) || (mysql_num_rows(mysql_query($sql_check_email)) >= 1))
				{
					echo "<table width=375 style='background-color: #FF606C;' border=0> <tr><td>";
					echo "<font size='2' face='verdana' color='black'>Either your user name or email already exist.</font>";
					echo "</td></tr></table>";
				} else {
					$sql_add_user="INSERT INTO USER (username, password, email, name) "
					. "values('" . $_POST['user_name'] . "','" . $_POST['password'] . "','" . $_POST['email'] . "', '" . $_POST['name'] . "')";
					if (mysql_query($sql_add_user))
					{
						echo "<table width=375 style='background-color: #CCFF99;' border=0> <tr><td>";
						echo "<font size='2' face='verdana' color='green'>User Name " . $_POST['user_name'] . " has signed up sucessfully, please Login Now.";
						echo "</td></tr></table>";
					}
					else {
						die('Error: ' . mysql_error());
					}
				}
			}
		} catch (Message $e) {
			echo $e->getMessage();
			exit();
		}
	}

	$request_captcha = htmlspecialchars($_REQUEST['captcha']);
		
	echo <<<HTML
			        <div id="result" style="$style">
			        <h2>$captcha_message</h2>
			        <table>
			        <tr>
			            <td>Session CAPTCHA:</td>
			            <td>{$_SESSION['captcha']}</td>
			        </tr>
			        <tr>
			            <td>Form CAPTCHA:</td>
			            <td>$request_captcha</td>
			        </tr>
			        </table>
			        </div>
HTML;
	unset($_SESSION['captcha']);
}


	
?>

</head>
<body>
			

	<form class="cmxform" id="signupform" method="post" action="">
		<fieldset class="ui-widget ui-widget-content ui-corner-all">
			<legend class="ui-widget ui-widget-header ui-corner-all">User Sign Up
				Form For Using Schedular</legend>
			<p>
			<label for="full_name">Full Name</label> 
			<input id="full_name" name="full_name" minlength="2" required type="text" /> 
			<label for="email">Email Name</label> 
			<input id="email" name="email" minlength="2" required type="text" /> 
			<label for="user_name">User Name</label> 
			<input id="user_name" name="user_name" minlength="2" required type="text" /> 			
			<label for="password">Password</label> 
			<input id="password" name="password" minlength="2" required type="password" />
			</p>
			<?php
			?>

			<img src="../common/external/cool-php-captcha-0.3.1/captcha.php"
				id="captcha" /><br />


			<!-- CHANGE TEXT LINK -->
			<a href="#"
				onclick="document.getElementById('captcha').src='../common/external/cool-php-captcha-0.3.1/captcha.php?'+Math.random(); document.getElementById('captcha-form').focus();"
				id="change-image">Not readable? Change text.</a> 
				<br /> <br /> 
				<input
				type="text" name="captcha" id="captcha-form" required autocomplete="off" /><br />


			<p>
				<tr>
					<td>
						<button type="submit" class="submit" name="Submit" id="submit" onclick="send(this.form)" value="Submit">Sign Me In</button>
						&nbsp;&nbsp;&nbsp;<a href="../index.php"><font size="2"
							face="verdana" color="green">Login Now </font> </a>
					</td>
				</tr>

			</p>
		</fieldset>

	</form>


	<div style="display: none" id="dialogData"></div>


	<script src="../common/external/jquery-ui/js/jquery-1.8.2.js"
		type="text/javascript"></script>
	<script
		src="../common/external/jquery-validation/dist/jquery.validate.js"
		type="text/javascript"></script>
	<script src="../common/external/jquery-ui-git/jquery-ui-git.js"
		type="text/javascript"></script>
	<script type="text/javascript">
$.validator.setDefaults({
	//submitHandler: function() { alert("submitted!"); },
	showErrors: function(map, list) {
		// there's probably a way to simplify this
		var focussed = document.activeElement;
		if (focussed && $(focussed).is("input, textarea")) {
			$(this.currentForm).tooltip("close", { currentTarget: focussed }, true)
		}
		this.currentElements.removeAttr("title").removeClass("ui-state-highlight");
		$.each(list, function(index, error) {
			$(error.element).attr("title", error.message).addClass("ui-state-highlight");
		});
		if (focussed && $(focussed).is("input, textarea")) {
			$(this.currentForm).tooltip("open", { target: focussed });
		}
	}
});

(function() {
	// use custom tooltip; disable animations for now to work around lack of refresh method on tooltip
	$("#signupform").tooltip({
		show: false,
		hide: false
	});

	// validate the comment form when it is submitted
	$("#signupform").validate();

	$(":submit").button();

});

$.fn.themeswitcher && $('<div/>').css({
	position: "absolute",
	right: 10,
	top: 10
}).appendTo(document.body).themeswitcher();

</script>




</body>
</html>
