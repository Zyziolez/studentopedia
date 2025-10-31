<?php 
    $comment_author = $conn->query('SELECT imie FROM student WHERE indeks_studenta = '.$row['indeks_studenta'].' LIMIT 1')->fetch_assoc();

    if($row['indeks_studenta'] == $student_info_array['indeks_studenta']){
        $has_user_commented = true;
        ?>
        <div class="speech-bubble my-comment" >
            <?php 
                echo '<p>'.$comment_author['imie'].' (Twój komentarz)</p>';
                echo '<h3>'.$row['tresc'].'</h3>';
            ?> 
        </div>
        <?php
    }else{
         ?>
        <div class="speech-bubble" >
            <?php 
                echo '<p>'.$comment_author['imie'].'</p>';
                echo '<h3>'.$row['tresc'].'</h3>';
            ?> 
        </div>
        <?php
    }
?>
