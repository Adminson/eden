<?php

$connect = @mysql_connect('localhost', 'root', '');
mysql_select_db('cakes');

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cakes";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>