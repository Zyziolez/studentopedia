<?php 
$comments_array = $conn->query('SELECT * from komentarz where id_przedmiotu = '.$id_przedmiotu.' ORDER BY data_wystawienia DESC');
$has_user_commented = false;

?>
<div id="course-comments" >
    <h2 style="margin-top: 15px;" >Komentarze:</h2>
    <?php 
        if(!$has_user_commented){
            echo 'user hasnnt commented';
        }
    ?>
    <?php 
        while($row = $comments_array->fetch_assoc()){
            include('comment.php');
        }
    ?>
</div>

