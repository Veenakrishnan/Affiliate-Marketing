<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli("localhost", "root", "", "affiliated_marketing");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>