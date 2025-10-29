<?php 
function select_course(){
    echo "KURS WYBRANY";
}
?>

<div id="content-right" >
            <h2> Twoje przedmioty: </h2>
            
                <?php 
                while ($row = $student_courses->fetch_assoc()){
                    include("course_element.php");
                }
            ?>
            
</div>