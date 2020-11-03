<?php
    session_start();

    require_once 'dao.php';
    $dao = new dao();
    
    $_SESSION['bad'] = array();
    $_SESSION['good_messages'] = array();

    //Validation
    $userExistence = $dao->userExists($_POST['username']);
    if ($userExistence['username'] == $_POST['username']) {
        $_SESSION['bad'][] = "**This username is already taken.";
    }

    $pwRegex = "/^(?=.*[0-9])(?=.*[A-Z])\S{8,}?/";
    if (!preg_match($pwRegex, $_POST['password'])) {
        $_SESSION['bad'][] = "**Password must be at least 8 characters long and have at least one digit and one uppercase";
    }

    if ($_POST['password'] !== $_POST['confirm-pw']) {
        $_SESSION['bad'][] = "**Passwords do not match";
    }

    if (count($_SESSION['bad']) > 0) {
        $_SESSION['created'] = false;
        header("Location: createAccount.php");
        exit;
    } else {
        $dao->createAccount($_POST['fname'], $_POST['lname'], $_POST['username'], $_POST['password']);
        $_SESSION['authenticated'] = true;
        $_SESSION['created'] = true;
        $user = $dao->userExists($_POST['username']);
        $_SESSION['userID'] = $user['user_id'];
        header("Location: index.php");
    }
?>