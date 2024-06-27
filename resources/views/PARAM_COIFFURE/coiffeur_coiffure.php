<?php
session_start();

include('ctn.php');

$sql="SELECT coiffeur.nom_coiffeur, coiffure.nom_coiffure, coiffure.prix_coiffure, commande_coiffure.id_coiffure, commande_coiffure.login_coiffeur 
FROM commande_coiffure 
JOIN coiffure ON commande_coiffure.id_coiffure = coiffure.id_coiffure 
JOIN coiffeur ON commande_coiffure.login_coiffeur = coiffeur.login_coiffeur";

$prepare = $cnx->prepare($sql);
$prepare->execute();
$coiffeur_coiffures = $prepare->fetchAll(PDO::FETCH_ASSOC);

// Tableau associatif pour regrouper les coiffures par coiffeur
$coiffeurs = array();

foreach ($coiffeur_coiffures as $cc) {
    $coiffeur_nom = $cc['nom_coiffeur'];
    // Vérifier si le coiffeur est déjà dans le tableau des coiffeurs
    if (!isset($coiffeurs[$coiffeur_nom])) {
        // Si le coiffeur n'est pas encore dans le tableau, l'ajouter avec un tableau vide pour stocker ses coiffures
        $coiffeurs[$coiffeur_nom] = array();
    }
    // Ajouter la coiffure à la liste des coiffures du coiffeur
    $coiffeurs[$coiffeur_nom][] = $cc;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des coiffeurs et leurs coiffures</title>
</head>
<body>
    <div style="margin-left:230px;">
        <?php include('../header_ad.php')  ?>

        <table id="liste" style="width:90%" class="table table-striped table-bordered">
            <thead>
                <tr bgcolor="lightblue">
                    <th>Nom du coiffeur</th>
                    <th>Coiffures</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($coiffeurs as $coiffeur_nom => $coiffures): ?>
                    <tr>
                        <td><?php echo $coiffeur_nom; ?></td>
                        <td>
                            <ul>
                                <?php foreach($coiffures as $coiffure): ?>
                                    <li><?php echo $coiffure['nom_coiffure']; ?> - <?php echo $coiffure['prix_coiffure']; ?> €</li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                        <td>
                            <!-- Ajouter un lien vers la page de modification avec l'identifiant du coiffeur -->
                            <a href="modifier_coiffeur.php?coiffeur=<?php echo $coiffeur_nom; ?>">Modifier</a>
                            <!-- Ajouter un lien vers la page d'ajout de coiffure avec l'identifiant du coiffeur -->
                            <a href="ajouter_coiffure.php?coiffeur=<?php echo $coiffeur_nom; ?>">Ajouter coiffure</a>
                            <!-- Ajouter un lien vers la page de suppression de coiffure avec l'identifiant du coiffeur -->
                            <a href="supprimer_coiffure.php?coiffeur=<?php echo $coiffeur_nom; ?>">Supprimer coiffure</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
