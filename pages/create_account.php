<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utwórz konto</title>
</head>
<body>
    <div>
        <h1>Ups, wygląda na to, że nie ma takiego użytkownika</h1>
        <h2>Uzupełnij swojje dane, a utworzymy konto za ciebie!</h2>
        <form method="POST" action="../actions/create_account.php" >
            <label for="course" name="course_label">Wybierz kierunek:</label> 
            <select name="course" id="course" >
                <?php
                    include '../includes/db_connect.php';
                    $inq = $conn->query('SELECT * from kierunek k, rok r, grupa g');
        $result = $inq->fetch_assoc()

                ?>
            </select>
            <label for="year" name="year_label">Wybierz rok:</label> 
            <select name="year" id="year" ></select>
            <label for="group" name="group_label">Wybierz grupę:</label> 
            <select name="group" id="group" ></select>
        </form>
        <form method="POST" action="../actions/create_group.php" >
            <h2>lub utwórz grupę:</h2>
            <label for="course" name="course_label">Wybierz kierunek:</label> 
            <select name="course" id="course" ></select>
            <label for="year" name="year_label">Wybierz rok:</label> 
            <select name="year" id="year" ></select>
            <label for="group_id" name="group_label">Oznaczenie grupy:</label>
            <input type="text" id="group_id" name="group_id" />
        </form>
    </div>
</body>
</html>