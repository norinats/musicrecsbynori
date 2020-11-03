<?php
    require_once 'KLogger.php';

    class dao {
        private $host = "localhost";
        private $db = "musicrecs";
        private $user = "nnats";
        private $pass = "password";

        //mysql --user="bd104bf11f6598" --password="0a75d9d2" heroku_f3cb8172441e4c8 --host="us-cdbr-east-02.cleardb.com"
        // private $host = "us-cdbr-east-02.cleardb.com";
        // private $db = "heroku_f3cb8172441e4c8";
        // private $user = "bd104bf11f6598";
        // private $pass = "0a75d9d2";
        private $logger;

        public function __construct () {
            $this->logger = new KLogger("log.txt", KLogger::DEBUG);
        }

        public function getConnection () {
            $this->logger->LogDebug("getting a connection");
            try {
                $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
                return $conn;
            } catch (Exception $e) {
                $this->logger->LogFatal("oops the database is down" . print_r($e,1));
                exit;
            }
        }

        public function logMessage ($message) {
            $this->logger->LogDebug($message);
        }

        public function createAccount ($fname, $lname, $username, $password) {
            $conn = $this->getConnection();
            $this->logger->LogInfo("creating account [$fname, $lname, $username]");
            $stmt = "insert into user (first_name, last_name, username, password) values (:fname, :lname, :un, :pw)";
            $q = $conn->prepare($stmt);
            $q->bindParam(":fname", $fname);
            $q->bindParam(":lname", $lname);
            $q->bindParam(":un", $username);
            $q->bindParam(":pw", $password);
            $q->execute();
        }

        public function userExists ($username) {
            $conn = $this->getConnection();
            $stmt = "select user_id, username from user where username=:un";
            $q = $conn->prepare($stmt);
            $q->bindParam(":un", $username);
            $q->execute();
            return reset($q->fetchAll(PDO::FETCH_ASSOC));
        }

        public function login ($username, $password) {
            $conn = $this->getConnection();
            $this->logger->LogInfo("Logging in user [$username]");
            $stmt = "select username, password, user_id from user where username=:un AND password=:pw";
            $q = $conn->prepare($stmt);
            $q->bindParam(":un", $username);
            //$pwHash = hash("sha256", $password);
            $q->bindParam(":pw", $password);
            $q->execute();
            return reset($q->fetchAll(PDO::FETCH_ASSOC));
            //return $conn->query($stmt, PDO::FETCH_ASSOC);
        }

        public function addSong ($tag, $title, $artist, $description, $userID) {
            $conn = $this->getConnection();
            $this->logger->LogInfo("User {$userID} inserting - [tag: {$tag}, song: {$title}, artist: {$artist}] into song db");
            $stmt = "insert into song (tag, title, artist, description, user_id) values (:tag, :title, :artist, :description, :userID)";
            $q = $conn->prepare($stmt);
            $q->bindParam(":tag", $tag, PDO::PARAM_STR);
            $q->bindParam(":title", $title);
            $q->bindParam(":artist", $artist);
            $q->bindParam(":description", $description, PDO::PARAM_STR);
            $q->bindParam(":userID", $userID, PDO::PARAM_INT);
            $q->execute();
        }

        public function getSongInfo ($songID) {
            $conn = $this->getConnection();
            $this->logger->LogInfo("Get song with song_id: $songID");
            $stmt = "select song_id, tag, title, artist, description from song where song_id=:id";
            $q = $conn->prepare($stmt);
            $q->bindParam(":id", $songID, PDO::PARAM_INT);
            $q->execute();
            $ret = $q->fetchAll(PDO::FETCH_ASSOC);
            return reset($ret);
        }

        public function getSongs () {
            $conn = $this->getConnection();
            $this->logger->LogInfo("Getting all the songs in the database");
            //$stmt = "select * from song order by song_id desc limit 10";
            return $conn->query("select * from song", PDO::FETCH_ASSOC);
        }

        public function getComments ($songID) {
            $conn = $this->getConnection();
            $this->logger->LogInfo("Getting comments for song with id: {$songID}");
            $stmt = "select * from comment where song_id=:songID";
            $q = $conn->prepare($stmt);
            $q->bindParam(":songID", $songID, PDO::PARAM_INT);
            $q->execute();
            $ret = $q->fetchAll(PDO::FETCH_ASSOC);
            $this->logger->LogDebug(print_r($ret, 1));
            return $ret;
        }

        public function addComment ($userID, $songID, $comment) {
            $conn = $this->getConnection();
            $this->logger->LogInfo("User [$userID] added comment [$comment] to song [$songID]");
            $stmt = "insert into comment (comment, user_id, song_id) values (:comment, :user_id, :song_id)";
            $q = $conn->prepare($stmt);
            $q->bindParam(":comment", $comment);
            $q->bindParam(":user_id", $userID);
            $q->bindParam(":song_id", $songID);
            $q->execute();
        }
    }