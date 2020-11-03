<?php 
session_start(); 
require_once 'songs.php'; 
?>
<html>
	<head>
        <link rel="stylesheet" type="text/css" href="css/index.css">

        <?php require_once "header.php"; ?>

        <div class="row">
        <div class="column" id="column-left">
            <?php renderSongs(); ?>
        </div>

        <div class="column request-rec" id="column-right">
            <ul>
                <li><a href="rec_req.php?tag=request">Request Recommendations</a></li>
                <li><a href="rec_req.php?tag=recommend">Recommend a Song</a></li>
            </ul>
        </div>
        </div>
        
        <?php require_once "footer.php"; ?>