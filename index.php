<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studentopedia</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Momo+Trust+Display&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
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
            <input type="number" name="student_index" id="student_index" placeholder="Numer indeksu" minlength="6" maxlength="6">
            <button type="submit" >Zaloguj</button>
        </form>

        
    </div>
</body>
</html>