<?php
session_start();
// echo $_SESSION['student_index'];

include('../includes/db_connect.php');

$student_info = $conn->query('SELECT * FROM `student` WHERE indeks_studenta='.$_SESSION['student_index']);
if($student_info->num_rows == 0){
    $_SESSION['student_index'] = '';
    header('Location ./../actions/login.php');
}
$student_info_array = $student_info->fetch_assoc();

echo $student_info_array['imie'];
?>