<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'studentopedia';

    $conn = new mysqli($servername, $username, $password,$dbname);
    if ($conn->connect_error) {
        header("Location: ./../pages/error-page.php?error=connectionfailed");
        exit;
    }
?>