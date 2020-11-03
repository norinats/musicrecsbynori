<?php
    require_once 'dao.php';

    function renderTable ($songID) {
        $dao = new dao();
        $comments = $dao->getComments($songID);
        if($comments == FALSE) {
            echo "No comments yet\n";
            exit();
        }
?>
    <table class="comments-table">
        <?php
            foreach ($comments as $comment) {
                $c = htmlspecialchars($comment['comment']);
                echo "<tr><td class='usr-prof-pic'><img src='images/profile_icon.png' alt='profile-pic'></td><td>{$c}</td></tr>";
            }
        ?>
    </table>
<?php
    }

    function songProfile ($songID) {
        $dao = new dao();
        $profile = $dao->getSongInfo($songID);
        if($profile == false) {
            echo "Song doesn't exist??";
            exit();
        }
        ?>
        <h2><?php echo htmlspecialchars($profile['title']); ?></h2>
        <h4><?php echo htmlspecialchars($profile['artist']); ?></h4>
        <p><?php echo htmlspecialchars($profile['description']); ?></p>
<?php
    }
?>