<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/request.css">
    <?php require_once "header.php"; ?>

        <h1>SONG REQUEST/RECOMMENDATION</h1>
        <form method="POST" action="rec_req_handler.php">
            <ul class="rec-req">
                <li><label for="tag">Tag:</label></li>
                <li>
                    <select name="tag" id="tag">
                    <option value="request">request</option>
                    <option value="recommend">recommendation</option>
                    </select>
                </li>
                <li><label for="song-name">Song Name:</label></li>
                <li><input type="text" id="song-name"></li>
                <li><label for="artist">Artist:</label></li>
                <li><input type="text" id="artist"></li>
                <li><label for="description">Description:</label></li>
                <li><textarea name="description" id="description"></textarea></li>
                <li><input type="submit" value="Submit"></li>
            </ul>
        </form>
    </body>
</html>