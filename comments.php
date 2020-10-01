<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/comments.css">
    <?php require_once "header.php"; ?>

        <div class="song-profile">
            <img src="images/favicon.png">
            <div>
                <h2>Song Name</h2>
                <h4>Artist</h4>
                <p>Recommendation/Request Description</p>
            </div>
        </div>

        <form method="POST" action="comment_handler.php">
            <textarea name="" id="" ></textarea>
            <br>
            <input type="submit" value="post comment">
        </form>

        <table class="comments-table">
            <tr><td><img src="images/profile_icon.png" alt="profile-pic"></td><td>omg i love this song</td></tr>
            <tr><td><img src="images/profile_icon.png" alt="profile-pic"></td><td>you should listen to ____ also!!</td></tr>
        </table>
    <?php require_once "footer.php"; ?>
