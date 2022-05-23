<?php
    define('DB_SERVER', 'localhost');       // DB server
    define('DB_USERNAME', 'root');   // DB username
    define('DB_PASSWORD', '');   // DB password
    define('DB_DATABASE', 'conferencems');       // DB name

    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
    $database = mysqli_select_db($conn, DB_DATABASE) or die( "Unable to select database");
?>
