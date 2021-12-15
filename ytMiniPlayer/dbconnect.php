<?php
//Require ENV
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'ytminiplayer');

// Connect to server (localhost server)
$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

// Test the connection
if (!$conn) {
    die("Could not connect: " . mysqli_connect_error());
}