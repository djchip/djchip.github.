<?php
    define('HOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', 'bachien2k1');
    define('DATABASE', 'final_smartphone');

    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (mysqli_connect_error()) {
        die('Error connecting to db: '. mysqli_connect_error());
    }
?>