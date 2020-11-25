<?php
	session_start();

	if (isset($_SESSION['accountForm'])) {
		$fnamePreset = $_SESSION['accountForm']['fname'];
		$lnamePreset = $_SESSION['accountForm']['lname'];
		$unPreset = $_SESSION['accountForm']['username'];
	} else {
		$fnamePreset = "";
		$lnamePreset = "";
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
					<li><h2>CREATE ACCOUNT</h2></li>
					<?php
						if(isset($_SESSION['created']) && !$_SESSION['created']) {
							if (isset($_SESSION['bad'])) {
								foreach ($_SESSION['bad'] as $msg) {
									echo "<li class='error-msg'> {$msg} </li>";
								}
							}
						}
					?>
					<li>
						<form method="POST" action="createAccount_handler.php">
							<div><label for="fname">First Name:</label><input value="<?php echo $fnamePreset; ?>" type="text" id="fname" name="fname" required></div>
							<div><label for="lname">Last Name:</label><input value="<?php echo $lnamePreset; ?>" type="text" id="lname" name="lname"></div>
							<div><label for="username">Username:</label><input value="<?php echo $unPreset; ?>" type="text" id="username" name="username" required></div>
							<div><label for="password">Password:</label><input type="password" id="password" name="password" required></div>
							<div><label for="confirm-pw">Confirm Password:</label><input type="password" id="confirm-pw" name="confirm-pw" required></div>
							<div><input type="submit" value="Create Account"></div>
						</form>
					</li>
				</ul>
			</div>
		</div>
		<?php require_once "footer.php"?>
