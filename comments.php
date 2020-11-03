<?php
    session_start();
    require_once 'commentFunctions.php';
    $songID = $_GET['id'];
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/comments.css">
    <?php require_once "header.php"; ?>

        <div class="song-profile">
            <img src="images/favicon.png">
            <div>
                <?php songProfile($songID); ?>
            </div>
        </div>
        <div>
            <?php
                if (!isset($_SESSION['authenticated']) && !empty($_SESSION['comment-err'])) {
                    echo print_r($_SESSION['comment-err'], 1);
                    unset($_SESSION['comment-err']);
                } elseif (isset($_SESSION['authenticated']) && !$_SESSION['authenticated'] && !empty($_SESSION['comment-err'])) {
                    echo print_r($_SESSION['comment-err'], 1);
                    unset($_SESSION['comment-err']);
                }
            ?>
        </div>
        <div>
        <form method="POST" action="comment_handler.php?songID=<?php echo $songID;?>">
            <textarea name="newComment" id="newComment" ></textarea>
            <br>
            <input type="submit" value="post comment">
        </form>
        </div>
        <div>
            <?php renderTable($songID); ?>
        </div>


    <?php require_once "footer.php"; ?>