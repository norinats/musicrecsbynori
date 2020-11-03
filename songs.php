<?php
    require_once 'dao.php';

    function renderSongs () {
        $dao = new dao();
        $songs = $dao->getSongs();
        // if (count($songs) == 0) {
        //     echo "No comments yet";
        //     exit;
        // }
        foreach ($songs as $song) {
            $tag = htmlspecialchars($song['tag']);
            $title = htmlspecialchars($song['title']);
            $artist = htmlspecialchars($song['artist']);
            $descr = htmlspecialchars($song['description']);
            $songID = $song['song_id'];

            if ($song['tag'] == 'REQUEST') {
                ?>
                <div class='song request'>
            <?php
            } elseif ($song['tag'] == 'RECOMMEND') {
            ?>
                <div class='song recommendation'>
            <?php
            }
            ?>
            <div> 
                <a class='song-link' href='comments.php?id=<?php echo $songID;?>'>
                    <img class='album' src='images/favicon.png' alt='album-artwork'>
                </a>
            </div>
            <div>
                <h2><?php echo $title; ?></h2>
                <h4><?php echo $artist; ?></h4>
                <p><?php echo $descr; ?></p>
            </div>
            <?php
            if ($song['tag'] == 'REQUEST') {
                ?>
                <div class='hashtag'>#Request</div>
            <?php
            } elseif ($song['tag'] == 'RECOMMEND') {
                ?>
                <div class='hashtag'>#Recommendation</div>
            <?php
            } ?>
            </div>
<?php
        }
    }
?>