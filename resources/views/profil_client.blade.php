<?php
// // Inclure le fichier de connexion à la base de données
// include('ctn.php');

// // Démarrer la session pour accéder aux variables de session
// session_start();

// // Vérifier si l'utilisateur est connecté en tant que client
// if(!isset($_SESSION['login_client'])){
//     // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
//     header('Location: index.php');
//     exit; // Arrêter l'exécution du script après la redirection
// }

// // Récupérer le nom d'utilisateur du client à partir de la session
// $login_client = $_SESSION['login_client'];

// // Préparer la requête SQL pour récupérer les informations du client à partir de la base de données
// $query = "SELECT * FROM client WHERE login_client = ?";
// $stmt = $cnx->prepare($query);
// $stmt->execute([$login_client]);
// $client = $stmt->fetch(PDO::FETCH_ASSOC);

// // Vérifier si des données ont été trouvées pour ce client
// if (!$client) {
//     echo "Aucune information trouvée pour ce client.";
//     exit; // Arrêter l'exécution du script si aucune information n'est trouvée
// }

// // Vérifier si le formulaire a été soumis
// if (isset($_POST["envoyer"])) {
//     // Récupérer les données du formulaire et les nettoyer pour éviter les failles de sécurité
//     $mot_pass_client = htmlspecialchars($_POST['mot_pass_client']);
//     $nom_client = htmlspecialchars($_POST['nom_client']);
//     $prenom_client = htmlspecialchars($_POST['prenom_client']);
//     $email_client = htmlspecialchars($_POST['email_client']);
//     $telephone_client = htmlspecialchars($_POST['telephone_client']);
//     $datenaiss_client = htmlspecialchars($_POST['datenaiss_client']);

//     // Préparer la requête SQL pour mettre à jour les informations du client
//     $query = "UPDATE client SET mot_pass_client = ?, nom_client = ?, prenom_client = ?, email_client = ?, telephone_client = ?, datenaiss_client = ? WHERE login_client = ?";
//     $stmt = $cnx->prepare($query);
//     $stmt->execute([$mot_pass_client, $nom_client, $prenom_client, $email_client, $telephone_client, $datenaiss_client, $login_client]);

//     // Vérifier si la mise à jour a réussi
//     if ($stmt->rowCount() > 0) {
//         // Rediriger vers la page de profil avec un message de succès
//         header('Location: compte_cl.php?success=1');
//         exit;
//     } else {
//         // Rediriger vers la page de profil avec un message d'erreur
//         header('Location: profil.php?error=1');
//         exit;
//     }
// }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil du Client</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assurez-vous d'ajouter votre propre fichier de styles CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <style>
        
    </style>
</head>
<body>
@include('header')
<div class="container" style="margin-top:70px;">
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <h1>Profil de {{ $client->nom_client }}</h1>
    <!-- Formulaire pour afficher et modifier les informations du profil -->
    <form action="" method="post">
        .
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="login_client">Login :</label>
                    <input type="text" id="login_client" name="login_client" class="form-control" value="{{ $client->login_client }}" readonly>
                </div>
                <div class="form-group">
                    <label for="mot_pass_client">Mot de passe :</label>
                    <input type="password" id="mot_pass_client" name="mot_pass_client" class="form-control" value="{{ $client->mot_pass_client }}" required>
                </div>
                <div class="form-group">
                    <label for="nom_client">Nom :</label>
                    <input type="text" id="nom_client" name="nom_client" class="form-control" value="{{ $client->nom_client }}" required>
                </div>
                <div class="form-group">
                    <label for="email_client">Email :</label>
                    <input type="email" id="email_client" name="email_client" class="form-control" value="{{ $client->email_client }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prenom_client">Prénom :</label>
                    <input type="text" id="prenom_client" name="prenom_client" class="form-control" value="{{ $client->prenom_client }}" required>
                </div>
                <div class="form-group">
                    <label for="telephone_client">Téléphone :</label>
                    <input type="tel" id="telephone_client" name="telephone_client" class="form-control" value="{{ $client->telephone_client }}" required>
                </div>
                <div class="form-group">
                    <label for="datenaiss_client">Date de naissance :</label>
                    <input type="date" id="datenaiss_client" name="datenaiss_client" class="form-control" value="{{ $client->datenaiss_client }}" required>
                </div>
            </div>
        </div>
        <button type="submit" name="envoyer" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
