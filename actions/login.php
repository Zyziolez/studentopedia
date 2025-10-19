<?php
    $student_index = $_POST["student_index"];
    session_start();
    include '../includes/db_connect.php';

    $inq = $conn->prepare('SELECT * FROM student WHERE indeks_studenta=?');
    $inq->bind_param('s', $student_index);
    $inq->execute();

    $result = $inq->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        echo $user['imie'];
    }else{
        include '../pages/create_account.php';
    }
?>