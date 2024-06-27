<?php
session_start();

include("ctn.php");

// Récupérer le login du coiffeur à partir de la session ou d'une autre source
$login_coiffeur = $_SESSION['login_coiffeur']; // Modifier selon votre logique de session

// Récupérer toutes les coiffures pour ce coiffeur
$requete_coiffures = "SELECT * FROM commande_coiffure WHERE login_coiffeur=?";
$prepare_coiffures = $cnx->prepare($requete_coiffures);
$prepare_coiffures->execute([$login_coiffeur]);
$coiffures = $prepare_coiffures->fetchAll(PDO::FETCH_ASSOC);

// Si le formulaire d'ajout est soumis
if (isset($_POST['ajouter_coiffure'])) {
    $nom_coiffure = $_POST['nom_coiffure'];
    // Insérer la nouvelle coiffure dans la base de données
    $requete_insert = "INSERT INTO commande_coiffure (nom_coiffure, login_coiffeur) VALUES (?, ?)";
    $prepare_insert = $cnx->prepare($requete_insert);
    $prepare_insert->execute([$nom_coiffure, $login_coiffeur]);
    // Rafraîchir la page pour afficher la nouvelle coiffure
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Si le formulaire de modification est soumis
if (isset($_POST['modifier_coiffure'])) {
    $id_coiffure = $_POST['id_coiffure'];
    $nouveau_nom = $_POST['nouveau_nom'];
    // Mettre à jour le nom de la coiffure dans la base de données
    $requete_update = "UPDATE commande_coiffure SET nom_coiffure=? WHERE id_coiffure=? AND login_coiffeur=?";
    $prepare_update = $cnx->prepare($requete_update);
    $prepare_update->execute([$nouveau_nom, $id_coiffure, $login_coiffeur]);
    // Rafraîchir la page pour refléter les modifications
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Coiffures</title>
    <!-- Styles Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Liste des Coiffures</h1>
    <!-- Affichage des coiffures existantes -->
    <h2>Coiffures existantes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Identifiant</th>
                <th>Nom de la Coiffure</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coiffures as $coiffure) : ?>
            <tr>
                <td><?php echo $coiffure['id_coiffure']; ?></td>
                <td><?php echo $coiffure['nom_coiffure']; ?></td>
                <td>
                    <!-- Formulaire de modification -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" name="id_coiffure" value="<?php echo $coiffure['id_coiffure']; ?>">
                        <input type="text" name="nouveau_nom" placeholder="Nouveau nom">
                        <button type="submit" name="modifier_coiffure" class="btn btn-sm btn-primary">Modifier</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Formulaire d'ajout de coiffure -->
    <h2>Ajouter une nouvelle coiffure</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="nom_coiffure">Nom de la Coiffure</label>
            <input type="text" class="form-control" id="nom_coiffure" name="nom_coiffure" required>
        </div>
        <button type="submit" name="ajouter_coiffure" class="btn btn-primary">Ajouter</button>
    </form>
</div>
</body>
</html>
