<?php
/*
session_start();
include("../ctn.php");
$sql = "SELECT * FROM coiffeur";
$prepare = $cnx->prepare($sql);
$prepare->execute();
$coiffeurs = $prepare->fetchAll(PDO::FETCH_ASSOC);
*/
?>
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Coiffeurs</title>
    <!-- Styles Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bibliothèque Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Styles supplémentaires */
        .coiffeur-box {
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 20px;
            width:90%;
            position: relative; /* Ajout de position relative pour positionner les boutons */
        }

        .coiffeur-initials {
            width: 50px;
            height: 50px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            line-height: 50px;
            font-size: 20px;
            border-radius: 50%;
            display: inline-block;
        }

        .coiffeur-details {
            display: inline-block;
            vertical-align: top;
            width: calc(100% - 100px); /* Ajustement de la largeur pour laisser de la place aux boutons */
        }

        .coiffeur-fullname {
            font-weight: bold;
        }

        .btn-modify,
        .btn-delete {
            background-color: transparent;
            border: none;
            font-size: 24px;
            cursor: pointer;
            position: absolute; /* Positionnement absolu */
            top: 50%; /* Alignement vertical */
            transform: translateY(-50%); /* Correction pour le centrage vertical */
        }

        .btn-modify {
            color: #ffc107;
            right: 50px; /* Distance du bord droit */
        }

        .btn-delete {
            color: #dc3545;
            right: 10px; /* Distance du bord droit */
        }
    </style>
</head>
<body>
<div class="container" style="margin-left:200px;">
@include('header_ad')

    <h1 class="my-4">Liste des Coiffeurs</h1>
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
    <center> <div>
    <a href="/GESTION_COIFFEUR/ajout_coiffeur"> <button class="btn btn-primary"style="color:white;text-decoration:none;font-weight:bold;"> Ajouter un nouveau coiffeur</button></a>
</div></center>
    <!-- Exemple de coiffeur -->
    @foreach($coiffeurs as $coiffeur)
    <div class="coiffeur-box">
        <div class="row">
            <div class="col-md-2">
                <div class="coiffeur-initials">AB</div>
            </div>
            <div class="col-md-8 coiffeur-details">
                <div class="coiffeur-fullname">{{ $coiffeur->nom_coiffeur }} {{ $coiffeur->prenom_coiffeur }}</div>
                <div>Login: {{ $coiffeur->login_coiffeur }}</div>
            </div>
            <div class="col-md-2 text-right"> <!-- Ajout de la classe text-right pour aligner à droite -->
                <a href="/GESTION_COIFFEUR/modif_coiffeur/{{$coiffeur->login_coiffeur}}"><button><i class="fas fa-edit btn-modify"></i></button></a>
                <a href="/GESTION_COIFFEUR/delete_coiffeur/{{$coiffeur->login_coiffeur}}" onclick="return confirm('Voulez-vous supprimer ?')"><button><i class="fas fa-trash-alt btn-delete"></i></button></a>
            </div>
        </div>
    </div>
@endforeach

    <!-- Ajoutez d'autres coiffeurs ici -->
</div>
<!-- Bibliothèque Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
