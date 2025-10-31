

<div id="content-right" >
            <h2> Zajęcia dla grupy <?php echo $student_info_array['id_grupy'] ?>: </h2>
            
                <?php 
                while ($row = $student_courses->fetch_assoc()){
                    echo '<div class="href-course">
                   <div class="href-course-data" >
                    <p>'.$row['nazwa_przedmiotu'].'</p>
                    <p class="href-course-proffesor-data" >'.$row['imie'].' '.$row['nazwisko'].'</p>
                   </div>
                     <a  href="?page=course_info&id='.$row['id_przedmiotu'].'"><button>ZOBACZ</button></a>
                    </div>';
                }
            ?>
            
</div>