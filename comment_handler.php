<?php
    session_start();
    
    require_once 'dao.php';
    $dao = new dao();

    $songID = $_GET['songID'];
    $comment = $_POST['newComment'];
    $user = $_SESSION['userID'];

    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
        $_SESSION['comment-err'] = "**You must be logged in to comment";
        header("Location: comments.php?id=".$songID);
        exit();
    }

    if(!empty($_POST['newComment'])) {
        $dao->addComment($user, $songID, $comment);
    } else {
        
    }
    
    header("Location: comments.php?id=".$songID);
    //header("Location: https://glacial-wave-58084.herokuapp.com/comments.php");
    exit();
?>