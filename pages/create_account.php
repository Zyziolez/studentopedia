<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utwórz konto</title>
</head>
<body>
    <div>
        
        <p><?php $indeks_studenta = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], 'indeks=') + 7) ?></p>
        <h1>Ups, wygląda na to, że nie ma takiego użytkownika</h1>
        <h2>Uzupełnij swoje dane, a utworzymy konto za ciebie!</h2>
        <form method="POST" >
        <?php
    $grupa_studenta='';
    $kierunek_studenta='';
    $rok_studenta='';
        if(isset($_POST['submit_course'])) {
            $kierunek_studenta=$_POST['course'];
            ?>
           
             <label for="year" name="year_label">Wybierz rok:</label> 
            <select name="year" id="year" >
                 <?php
                    include '../includes/db_connect.php';
                    $kierunki = $conn->query('SELECT * from rok WHERE id_kierunku='.$kierunek_studenta);
                    
                    
                    while($result = $kierunki->fetch_assoc()){
                        echo '<option value="'.$result['id_roku'].'">'.$result['rok'].'</option>';
                        // echo("<script>console.log('PHP: " . $result['id_kierunku'] . "');</script>");
                    }
        
                ?>
                </select>
                <button type="submit" name="submit_year" >Dalej</button>


           
            <?php
        }else if(isset($_POST['submit_year'])){
            $rok_studenta=$_POST['year'];
            ?>
 <label for="group" name="group_label">Wybierz grupę:</label> 
            <select name="group" id="group" >
                 <?php
                    include '../includes/db_connect.php';
                    $kierunki = $conn->query('SELECT * from grupa WHERE id_roku='.$rok_studenta);
                    
                    
                    while($result = $kierunki->fetch_assoc()){
                        echo '<option value="'.$result['id_grupy'].'">'.$result['id_grupy'].'</option>';
                        // echo("<script>console.log('PHP: " . $result['id_kierunku'] . "');</script>");
                    }
        
                ?>
                </select>
                <input type="text" name="name" placeholder="Imie" />
                <input type="text" name="surname" placeholder="Nazwisko" />
                <label for="s_role" >Jestem starostą</label><input type="checkbox" name="s_role" id="s_role" value="off" />
                <button type="submit" name="submit_all" >Zakończ</button>
            <?php
        }else if(isset($_POST['submit_all'])){
            $grupa_studenta=$_POST['group'];
            $imie_studenta=$_POST['name'];
            $nazwisko_studenta=$_POST['surname'];
            $rola_studenta=$_POST['s_role'];

            $rola_studenta_bool = 2;
            if($rola_studenta=='on'){
                $rola_studenta_bool = 1;
            }else{
                $rola_studenta_bool = 2;
            }
            include '../includes/db_connect.php';
            // echo ;
            if( $conn->query('INSERT INTO student VALUES ('.$indeks_studenta.',"'.$imie_studenta.'","'.$nazwisko_studenta.'",'.$grupa_studenta.','.$rola_studenta_bool.')')){
                session_start();
                $_SESSION['student_index'] = $indeks_studenta;
                header('Location: home.php');
                exit();
            }
            
        }
        else{
            
            ?>
            
          <label for="course" name="course_label">Wybierz kierunek:</label> 
            <select name="course" id="course" >
                <?php
                    include '../includes/db_connect.php';
                    $kierunki = $conn->query('SELECT * from kierunek');
                    
                    while($result = $kierunki->fetch_assoc()){
                        echo '<option value="'.$result['id_kierunku'].'">'.$result['nazwa_kierunku'].'</option>';
                    }
                ?>
        </select>
        <button type="submit" name="submit_course" >Dalej</button>
            <?php
        }
        ?>
        

            
        </form>
        <!-- <form method="POST" action="../actions/create_group.php" >
            <h2>lub utwórz grupę:</h2>
            <label for="course" name="course_label">Wybierz kierunek:</label> 
            <select name="course" id="course" ></select>
            <label for="year" name="year_label">Wybierz rok:</label> 
            <select name="year" id="year" ></select>
            <label for="group_id" name="group_label">Oznaczenie grupy:</label>
            <input type="text" id="group_id" name="group_id" />
        </form> -->
    </div>
</body>
</html>