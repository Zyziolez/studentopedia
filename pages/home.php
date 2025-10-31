<?php
session_start();
// echo $_SESSION['student_index'];

include('../includes/db_connect.php');

$page = $_GET['page'] ?? 'dashboard';

$allowed_pages = ['select_course', 'course_info'];
if (!in_array($page, $allowed_pages)) {
    $page = 'select_course';
}


if($_SESSION['student_index'] == ''){
    unset($_SESSION['student_index']);
    header('Location: ../index.php'); 
    exit;
}

$student_info = $conn->query('SELECT * FROM student WHERE indeks_studenta='.$_SESSION['student_index']);
if($student_info->num_rows == 0){
    unset($_SESSION['student_index']);
    header('Location: ../index.php'); 
}
$student_info_array = $student_info->fetch_assoc();
$student_courses = $conn->query('SELECT p.nazwa_przedmiotu as "nazwa_przedmiotu", z.id_zajec as "id_zajec", p.id_przedmiotu as "id_przedmiotu", pr.imie_prowadzacego as imie, pr.nazwisko_prowadzacego as nazwisko FROM przedmiot p, grupa g, zajecia z, student s, prowadzacy pr WHERE z.id_grupy = g.id_grupy and p.id_przedmiotu = z.id_przedmiotu and s.id_grupy = g.id_grupy and s.indeks_studenta='.$student_info_array['indeks_studenta'].' and pr.id_prowadzacego=p.id_prowadzacego;');

if($student_courses->num_rows == 0){
    showAlert('no courses');
}
// $student_courses_array = $student_courses->fetch_assoc();

function showAlert($message){
echo $message;
}
if (isset($_POST['logout-input'])) {
  unset($_SESSION['student_index']);
  header('Location: ../index.php'); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <link rel="stylesheet" href="../styles/styles.css" >
</head>
<body>
    <div id="home-main" >
        <div id="menu-left" >

            <h1 id="welcome" >Witaj, <?php echo $student_info_array['imie']; ?></h1>

        <form method="POST" name="logout" >
            <input name="logout-input" style="display: none;" />
            <button  >WYLOGUJ</button>
        </form>
        </div>

        <?php 
            include('../includes/'.$page.'.php');
        ?>
    </div>

</body>
</html>