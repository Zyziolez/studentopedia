<div class="course-info" >
    <?php 
// include('db_connect.php');
$id_przedmiotu = $_GET["id"];
// echo 'SELECT * from przedmiot where id_przedmiotu='. $id_przedmiotu.' limmit 1';
$course_info = $conn->query('SELECT * from przedmiot where id_przedmiotu='. $id_przedmiotu.' limit 1');
$course_info = $course_info->fetch_assoc();

$course_grade = $conn->query('SELECT AVG(wartosc) as average_grade FROM ocena_przedmiotu WHERE id_przedmiotu='.$id_przedmiotu);
if ($course_grade->num_rows > 0) {
    $course_grade = $course_grade->fetch_assoc();
}
$has_user_graded = false;

$user_graded_query = $conn->query('SELECT * FROM ocena_przedmiotu WHERE indeks_studenta='.$student_info_array['indeks_studenta'].' AND id_przedmiotu='.$course_info['id_przedmiotu']);
if( $user_graded_query->num_rows > 0) {
    $has_user_graded = true;
}
?>
<div class="course-main-info" >
    <a href="?page=select_course" ><button>cofnij</button></a></br>
    
<h2><?php echo $course_info['nazwa_przedmiotu']?></h2>
<?php 
if ($has_user_graded) {
    echo '<img id="star-icon" src="./../other/star_icon_filled.png" />';
}else{
    echo '<img id="star-icon" src="./../other/star_icon.png" />';
}

?>
<h2><?php echo round($course_grade["average_grade"], 2) ?></h2>
    
</div>
<p id="course-desc" ><?php echo $course_info['opis'] ?></p>
    <?php 
    include('course_comments.php');
    ?>
</div>