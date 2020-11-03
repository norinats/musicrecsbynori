<?php
    session_start();
    if (isset($_SESSION['authenticated']) && !$_SESSION['authenticated'] || !isset($_SESSION['authenticated'])) {
        header("Location: index.php");
        exit();
    }
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/request.css">
    <?php require_once "header.php"; ?>

        <h1>SONG REQUEST/RECOMMENDATION</h1>
        <div>
            <ul>
            <?php
                if (isset($_SESSION['songCreated']) && !$_SESSION['songCreated']) {
                    if (isset($_SESSION['missing'])) {
                        foreach ($_SESSION['missing'] as $msg) {
                            echo "<li class='error-msg'>{$msg}</li>";
                        }
                    }
                }
            ?>
            </ul>
        </div>
        <form method="POST" action="rec_req_handler.php">
            <ul class="rec-req">
                <li><label for="tag">Tag:</label></li>
                <li>
                    <select name="tag" id="tag">
                        <?php 
                            if ($_GET['tag'] == 'request') {
                                echo "<option value='request' selected>request</option>";
                                echo "<option value='recommend'>recommendation</option>";
                            } elseif ($_GET['tag'] == 'recommend') {
                                echo "<option value='request'>request</option>";
                                echo "<option value='recommend' selected>recommendation</option>";
                            } else {
                                echo "<option value='request'>request</option>";
                                echo "<option value='recommend'>recommendation</option>";
                            }
                        ?>
                    </select>
                </li>
                <li><label for="song-name">Song Name:</label></li>
                <li><input type="text" name="song-name" id="song-name"></li>
                <li><label for="artist">Artist:</label></li>
                <li><input type="text" name="artist" id="artist"></li>
                <li><label for="description">Description:</label></li>
                <li><textarea name="description" name="description" id="description"></textarea></li>
                <li><input type="submit" value="Submit"></li>
            </ul>
        </form>
<?php require_once "footer.php"; ?>