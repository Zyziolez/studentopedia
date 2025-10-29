<div>
<script>
    function setCourse(courseID){
        console.log(courseID)
    }
</script>
<button onclick="setCourse(<?php echo $row['id_zajec'] ?>)" >
    <?php 
        echo $row["nazwa_przedmiotu"];
    ?>
</button>
</div>