<?php
    session_start();
    
    require_once 'dao.php';
    $dao = new dao();

    if (empty($_POST['username']) || empty($_POST['password'])) {
        $_SESSION['loginMessage'] = "**Missing Fields: username or password";
        $_SESSION['authenticated'] = false;
        header("Location: login.php");
        exit;
    } else {
        $user = $dao->login($_POST['username'], $_POST['password']);
    }

    if (($user['username'] == $_POST['username']) && ($user['password'] == $_POST['password'])) {
        $_SESSION['authenticated'] = true;
        $_SESSION['userID'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        //header("Location: https://glacial-wave-58084.herokuapp.com");
    } else {
        $_SESSION['loginMessage'] = "**username or password incorrect";
        $_SESSION['authenticated'] = false;
        header("Location: login.php");
        //header("Location: https://glacial-wave-58084.herokuapp.com/login.php");
        exit;
    }
?>