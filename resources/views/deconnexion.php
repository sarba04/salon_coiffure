<?php
// Démarrer la session
session_start();

 session_destroy();

// Redirection après la déconnexion
if (isset($_SERVER['HTTP_REFERER'])) {
    $referer = $_SERVER['HTTP_REFERER']; // Récupérer l'URL de la page précédente
   
    // Vérifier d'où provient la demande de déconnexion
    if (strpos($referer, "admin_dashboard.php") !== false) {
        header("Location: connexion_ad.php"); // Rediriger vers page1.php
    } elseif (strpos($referer, "compte_cl.php") !== false) {
        header("Location: connexion_cl.php"); // Rediriger vers page2.php
    } else {
        header("Location: index.php"); // Rediriger vers une page par défaut
    }
} else {
    header("Location: default_page.php"); // Rediriger vers une page par défaut si HTTP_REFERER n'est pas disponible
}

exit; 
// Terminer le script
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5;url=connexion_cl.php">
    <title>Redirection...</title>
</head>
<body>
    <p>Vous êtes en cours de déconnexion...</p>
    <script>
        // Fermer l'onglet après 5 secondes
        setTimeout(function() {
            window.close();
        }, 5000);
    </script>
</body>
</html>
