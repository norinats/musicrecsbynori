
<link rel="icon" type="image/png" href="images/favicon.png">
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    </head>

	<body>
        <div id="nav-bar">
            <ul id="nav-list">
            <li class="nav"><a href="index.php"><img class="icons" src="images/home_icon.png" alt="Home"></a></li>
            <li class="nav"><a href="index.php"><img class="icons" src="images/favicon.png" alt="MusicRecsByNori"></a></li>
            <li class="nav" id="page-name">MusicRecsByNori</li>
            <li class="nav nav-right"><img class="icons" src="images/profile_icon.png" alt="Profile"></li>
            <?php 
                if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
            ?>
                <li class="nav nav-right login"><a href="logout.php">Logout</a></li>
            <?php
                } else {
            ?>
                <li class="nav nav-right login"><a href="login.php">Login</a></li>
                <li class="nav nav-right login"><a href="createAccount.php">Create Account</a></li>
            <?php
                }
            ?>
            </ul>
        </div>