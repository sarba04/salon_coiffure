
<?php
/*
session_start();
// Inclure le fichier de connexion à la base de données et les fonctions nécessaires
include('ctn.php');

// Récupérer la liste des clients depuis la base de données
$sql = "SELECT * FROM caissière";
$prepare = $cnx->prepare($sql);
$prepare->execute();
$caissieres = $prepare->fetchAll(PDO::FETCH_ASSOC);
*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Liste des Caissières</title>
    <style>
        /* Style pour la liste des caissières */
        body {
            background-color: #f8f9fa; /* Couleur de fond */
            font-family: Arial, sans-serif; /* Police de caractères */
        }

        .container {
            padding-top: 50px; /* Espacement depuis le haut */
        }

        .card {
            background-color: #fff; /* Couleur de fond de la carte */
            border-radius: 15px; /* Coins arrondis */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Ombre douce */
            transition: transform 0.3s ease-in-out; /* Animation de transition */
        }

        .card:hover {
            transform: scale(1.03); /* Zoom au survol */
        }

        .card-headerr {
            background-color: #007bff; /* Couleur de fond de l'en-tête */
            color: #fff; /* Couleur du texte de l'en-tête */
            padding: 20px; /* Espacement */
            border-top-left-radius: 15px; /* Coins arrondis */
            border-top-right-radius: 15px; /* Coins arrondis */
        }

        .card-body {
            padding: 20px; /* Espacement du contenu */
        }

        .card-body p {
            margin-bottom: 10px; /* Espacement entre les paragraphes */
        }

        .card-footer {
            background-color: #f9f9f9; /* Couleur de fond du pied de carte */
            padding: 20px; /* Espacement */
            border-bottom-left-radius: 15px; /* Coins arrondis */
            border-bottom-right-radius: 15px; /* Coins arrondis */
        }

        .btn-modify, .btn-delete {
            padding: 10px 20px; /* Espacement du bouton */
            border: none; /* Suppression de la bordure */
            cursor: pointer; /* Curseur au survol */
            border-radius: 5px; /* Coins arrondis */
            transition: background-color 0.3s; /* Animation de transition */
        }

        .btn-modify {
            background-color: #28a745; /* Couleur de fond du bouton Modifier */
            color: #fff; /* Couleur du texte */
        }

        .btn-delete {
            background-color: #dc3545; /* Couleur de fond du bouton Supprimer */
            color: #fff; /* Couleur du texte */
        }

        .btn-modify:hover, .btn-delete:hover {
            background-color: #218838; /* Assombrissement au survol */
        }

        /* Icône de caisse enregistreuse */
        .card-header i {
            font-size: 24px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div style="margin-left:230px;">
@include('header_ad')
    <center> <div>
    <a href="/GESTION_CAISSIERE/ajout_caissière"> <button class="btn btn-primary"style="color:white;text-decoration:none;font-weight:bold;"> Ajouter une nouvelle caissière</button></a>
</div></center>
<h1 class="my-4">Liste des Caissières</h1>
    @if(session()->has('success2'))
    <div class="alert alert-success">
        {{ session('success2') }}
    </div>
@endif
@if(session()->has('delete'))
    <div class="alert alert-success">
        {{ session('delete') }}
    </div> 
@endif
<div class="container">
    
    <div class="row">
    @foreach ($caissieres as $caissiere)
        <div class="col-md-4">
            <div class="card">
                <div class="card-headerr">
                    <i class="fas fa-cash-register"></i> 
                    {{ $caissiere->nom_caissière }} {{ $caissiere->prenom_caissière }}
                </div>
                <div class="card-body">
                    <p>Login: {{ $caissiere->login_caissière }}</p>
                    <p>Email: {{ $caissiere->email_caissière }}</p>
                    <p>Téléphone: {{ $caissiere->telephone_caissière }}</p>
                    <p>Date de Naissance: {{ $caissiere->datenaiss_caissière }}</p>
                </div>
                <div class="card-footer">
                    <a href="/GESTION_CAISSIERE/modif_caissière/{{$caissiere->login_caissière}}"><button class="btn-modify"><i class="fas fa-edit"></i> Modifier</button></a>
                    <a href="/GESTION_CAISSIERE/delete_caissière/{{$caissiere->login_caissière}}" onclick="return confirm('Voulez-vous supprimer ?')"><button class="btn-delete"><i class="fas fa-trash-alt"></i> Supprimer</button></a>
                </div>
            </div>
        </div>
    @endforeach
</div>

</div>
</div>
</body>
</html>

