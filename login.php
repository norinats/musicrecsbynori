<?php
	session_start();

	if (isset($_SESSION['loginForm'])) {
		$unPreset = $_SESSION['loginForm']['username'];
	} else {
		$unPreset = "";
	}
?>
<html>
	<head>
		<link rel="icon" type="image/png" href="images/favicon.png">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
		<link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
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
					<li><h2>LOGIN</h2></li>
					<?php
						if (isset($_SESSION['authenticated']) && !$_SESSION['authenticated']) {
							if (isset($_SESSION['loginMessage'])) {
								$msg = $_SESSION['loginMessage'];
								echo "<li id='error-msg'>{$msg}</li>";
							}
							//echo "<li id='error-msg'>**username or password incorrect</li>";
						}
					?>
					<li>
						<form method="POST" action="login_handler.php">
							<div><label for="username">Username:</label><input value="<?php echo $unPreset; ?>" type="text" id="username" name="username"></div>
							<div><label for="password">Password:</label><input type="password" id="password" name="password"></div>
							<div><input type="submit" value="Login"></div>
						</form>
					</li>
				</ul>
				
			</div>
		</div>

<?php require_once "footer.php"?>
