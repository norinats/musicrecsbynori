<?php
    session_start();
    session_destroy();
    header("Location: http://musicrecsbynori/index.php");
    exit;