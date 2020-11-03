<?php
    session_start();
    $_SESSION['missing'] = array();
    if (isset($_SESSION['songCreated'])) {
        unset($_SESSION['songCreated']);
    }

    require_once 'dao.php';
    $dao = new dao();

    $tag = $_POST['tag'];
    $title = $_POST['song-name'];
    $artist = $_POST['artist'];
    $description = $_POST['description'];

    if (($tag != 'recommend') && ($tag != 'request')) {
        $dao->logMessage("tag entered: " . $tag);
        $_SESSION['missing'][] = "**Tag must be Recommendation or Request";
    }

    if (empty($_POST['song-name'])) {
        $_SESSION['missing'][] = "**must enter song name";
    }
    
    if (empty($_POST['artist'])) {
        $_SESSION['missing'][] = "**must enter artist name";
    }

    if (empty($_POST['description'])) {
        $_SESSION['missing'][] = "**must enter some sort of description";
    }

    if (count($_SESSION['missing']) > 0) {
        $_SESSION['songCreated'] = false;
        header("Location: rec_req.php?=" . $tag);
        exit;
    } else {
        $dao->addSong($tag, $title, $artist, $description, $_SESSION['userID']);
        $_SESSION['songCreated'] = true;
        header("Location: index.php");
    }
?>