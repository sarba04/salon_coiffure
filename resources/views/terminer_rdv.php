<?php
include("ctn.php");
// Vérifier si l'identifiant du rendez-vous est passé en paramètre dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'ID du rendez-vous depuis l'URL
    $id_rdv = $_GET['id'];

    // Requête SQL pour mettre à jour le statut du rendez-vous à "annulé"
    $sql = "UPDATE rendez_vous SET statu_rdv = 'terminé' WHERE id_rdv = :id";

    // Préparer la requête
    $stmt = $cnx->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':id', $id_rdv);

    // Exécuter la requête
    $stmt->execute();

    // Redirection vers la page précédente (peut être modifié selon vos besoins)
    header("Location: admin_dashboard.php");
    exit();
} else {
    // Si l'ID du rendez-vous n'est pas passé en paramètre, afficher un message d'erreur
    echo "ID du rendez-vous non spécifié.";
}
?>
