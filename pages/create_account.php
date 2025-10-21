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
        <form method="POST" action="../actions/create_account.php" >
            <label for="course" name="course_label">Wybierz kierunek:</label> 
            <select name="course" id="course" >
                <?php
                    include '../includes/db_connect.php';
                    $kierunki = $conn->query('SELECT * from kierunek');
                    
                    while($result = $kierunki->fetch_assoc()){
                        echo '<option value="'.$result['id_kierunku'].'">'.$result['nazwa_kierunku'].'</option>';
                        // echo("<script>console.log('PHP: " . $result['id_kierunku'] . "');</script>");
                    }
        
                ?>
            </select>
            <label for="year" name="year_label">Wybierz rok:</label> 
            <select name="year" id="year" ></select>
            <label for="group" name="group_label">Wybierz grupę:</label> 
            <select name="group" id="group" ></select>
            <button type="submit">Utwórz konto</button>
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