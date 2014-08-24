<!DOCTYPE table PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<title>Login to Your Schedular</title>
<head>
</head>
<body>
	<div style="margin-top: 20%; margin-left: 0%; padding-top: 0px;">


		<table width="300" border="0" align="center" cellpadding="0"
			cellspacing="1" bgcolor="#CCCCCC">
			<tr>
				<td>
					<form name="form1" method="post"
						action="config/access_check.php">

						<table width="100%" border="0" cellpadding="3" cellspacing="1"
							bgcolor="#FFFFFF">
							<tr>
								<td colspan="3"><strong>Login to Your Schedular</strong>
								</td>
							</tr>
							<tr>
								<td width="78">Username</td>
								<td width="6">:</td>
								<td width="294"><input name="myusername" type="text"
									id="myusername">
								</td>
							</tr>
							<tr>
								<td>Password</td>
								<td>:</td>
								<td><input name="mypassword" type="password"
									id="mypassword">
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input type="submit" name="Submit" value="Login">
								&nbsp;&nbsp;&nbsp;<a href= "newuser/signup.php">Sign up</a>
								</td>

							</tr>
						</table>
					</form></td>

			</tr>
		</table>
	</div>

</body>
</html>