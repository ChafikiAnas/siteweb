<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = 'anas';
    $psw = '1234';
    $identifiant =($_POST['identifiant']);
    $password =($_POST['password']);

    if ($login == $identifiant && $psw == $password) {
        header('Location: page 2.php');
    } else {
        echo'<h3 style="color: red" >Le mot de passe ou l\'identifiant est incorrect</h3>';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Tracker</title>
    <link rel="stylesheet" href="style css.css">
    <link rel="icon" href="logo.png">
</head>
<body>

    <header>
        <div class="logo-container">
            <img src="logo.png" alt="Logo">
        </div>
    </header>

    <div class="container">
        <h1>Student Tracker</h1>
        <form action="index.php" method="POST">
            <label for="identifiant">Identifiant</label>
            <input type="text" id="identifiant" name="identifiant" required>
            
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Valider</button>
        </form>
    </div>

</body>
<footer>
    <p>&copy; 2025 Faculté des Sciences Semlalia Marrakech.</p>
</footer>

</html>
