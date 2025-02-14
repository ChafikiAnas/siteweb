<?php
session_start();

if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] !== true) {
    header('Location: index.php');
    exit();
}

if (!isset($_SESSION['resultats'])) {
    header('Location: page 2.php');
    exit();
}

$resultats = $_SESSION['resultats'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat</title>
    <link rel="stylesheet" href="style css.css">
    <link rel="icon" href="logo.png">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="logo.png" alt="Logo CheckEtudiant">
        </div>
    </header>

    <div class="container">
        <h1>Résultats de l'étudiant</h1>
        <p>Nom : <?php echo htmlspecialchars($resultats['etudiant']); ?></p>
        <p>Moyenne : <?php echo number_format($resultats['moyenne'], 2, ',', ' '); ?></p>
        <p style="color: <?php echo $resultats['observation'] === 'Admis' ? 'green' : 'red'; ?>">
            <?php if ($resultats['observation'] === 'Admis'): ?>
                Félicitations ! Vous êtes admis.
            <?php else: ?>
                Malheureusement, votre admission n'a pas été retenue.
            <?php endif; ?>
        </p>
    </div>

    <footer>
        <p>&copy; 2025 Faculté des Sciences Semlalia Marrakech.</p>
    </footer>
</body>
</html>