<?php
session_start();
if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] !== true) {
    header('Location: index.php');
    exit();
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Etudiant']) && isset($_POST['Math']) && isset($_POST['Informatique'])) {
        // Récupérer et nettoyer les données
        $etudiant = trim($_POST['Etudiant']);
        $math = floatval(str_replace(',', '.', $_POST['Math']));
        $info = floatval(str_replace(',', '.', $_POST['Informatique']));
        
        // Calculer la moyenne
        $moyenne = ($math + $info) / 2;
        $observation = ($moyenne >= 10) ? 'Admis' : 'Recalé';
        
        // Stocker dans la session
        $_SESSION['resultats'] = [
            'etudiant' => $etudiant,
            'moyenne' => $moyenne,
            'observation' => $observation
        ];
        
        // Rediriger vers page3.php
        header('Location: page 3.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Étudiant</title>
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
        <!-- Correction de l'action du formulaire -->
        <form action="page 2.php" method="POST">
            <label for="Etudiant">Étudiant</label>
            <input type="text" id="Etudiant" name="Etudiant" required>
    
            <label for="Math">Math</label>
            <input type="number" id="Math" name="Math" min="0" max="20" step="0.01" required>
    
            <label for="Informatique">Informatique</label>
            <input type="number" id="Informatique" name="Informatique" min="0" max="20" step="0.01" required>
    
            <button type="submit">Résultat</button>
            <button type="reset">Annuler</button>
        </form>
    </div>
    
    <footer>
        <p>&copy; 2025 Faculté des Sciences Semlalia Marrakech.</p>
    </footer>
</body>
</html>