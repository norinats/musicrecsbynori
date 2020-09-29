<html>
	<head>
		<link rel="icon" type="image/png" href="images/favicon.png">
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>

	<body>

		<div class="row">
			<div class="column col-left">
				<ul>
					<li><img src="images/favicon.png" alt="MusicRecsByNori"></li>
					<li><h1>MusicRecsByNori</h1></li>
				</ul>
			</div>
			<div class="column col-right">
				<ul>
					<li><h2>CREATE ACCOUNT</h2></li>
					<li>
						<form method="GET" action="createAccount_handler.php">
							<div>First Name:<input type="text" name="First Name"></div>
							<div>Last Name:<input type="text" name="Last Name"></div>
							<div>Username:<input type="text" name="username"></div>
							<div>Password:<input type="password" name="password"></div>
							<div>Confirm Password:<input type="password" name="confirm password"></div>
							<div><input type="submit" value="Create Account"></div>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</body>
</html>
