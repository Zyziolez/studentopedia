<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studentopedia</title>
    <link rel="stylesheet" href="./styles/">
</head>
<body>
    <div>
        <?php 
            include('./includes/db_connect.php');
            session_start();
            if (isset($_SESSION['student_index']) and $_SESSION['student_index'] != ''){
                header('Location: ./pages/home.php');
            } 

        ?>
        <h1>Witaj studencie!</h1>
        <h2>Podaj swój indeks aby się zalogować:</h2>
        
        <form method="POST" action="./actions/login.php" >
            <input type="text" name="student_index" id="student_index" placeholder="Numer indeksu">
            <button type="submit" >Zaloguj</button>
        </form>

        
    </div>
</body>
</html>