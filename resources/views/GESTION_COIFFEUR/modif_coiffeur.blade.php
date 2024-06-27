<?php
/*
session_start();

include("../ctn.php");
$para = $_GET["param"];

if (isset($_POST["login"])) {
    $log = $_POST["login"];
    $password = $_POST["mot_pass"];
    $nom = $_POST["nom"];
    $prenoms = $_POST["prenom"];
    $date = $_POST["date"];
    $telephone = $_POST["tel"];
    $adresse = $_POST["email"];
    $requete = "UPDATE coiffeur 
                SET 
                    login_coiffeur=?, 
                    mot_pass_coiffeur=?, 
                    nom_coiffeur=?, 
                    prenom_coiffeur=?, 
                    datenaiss_coiffeur=?, 
                    telephone_coiffeur=?, 
                    email_coiffeur=?
                WHERE login_coiffeur=?";
    $prepare = $cnx->prepare($requete);
    $tab = [$log, $password, $nom, $prenoms, $date, $telephone, $adresse, $para]; 
    $execute = $prepare->execute($tab);
    if ($execute) {
        
        echo("Modification effectuée avec succès");
        header("location: liste_coiffeur.php");
    } else {
        echo("Échec de la modification");
    }
}


// affichage de toute les coiffures

$coiffure_a_afficher= "SELECT * FROM coiffure";
$prepare = $cnx->prepare($coiffure_a_afficher);
$execute = $prepare->execute();
$coiffures = $prepare->fetch(PDO::FETCH_ASSOC);

// Traitement de l'ajout de nouvelle coiffure
if (isset($_POST["ajouter_coiffure"])) {
    // Récupère l'ID de la nouvelle coiffure à partir du formulaire
    $nouvelle_coiffure_id = $_POST["nouvelle_coiffure"];

    // Requête d'insertion pour ajouter la nouvelle coiffure à la liste du coiffeur
    $requete_ajout_coiffure = "INSERT INTO commande_coiffure (id_coiffure, login_coiffeur) VALUES (?, ?)";
    $prepare_ajout_coiffure = $cnx->prepare($requete_ajout_coiffure);
    $prepare_ajout_coiffure->execute([$nouvelle_coiffure_id, $para]);

        if($prepare_ajout_coiffure){
            $_SESSION['success_message'] = "La nouvelle coiffure a été ajoutée avec succès.";      
                            }

            // Rediriger vers la même page après l'ajout
            header("location: modif_coiffeur.php?param=$para");
            exit();

   
}
if (isset($_SESSION['success_message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
    // Détruire la variable de session après l'avoir affichée
    unset($_SESSION['success_message']);
}

// Traitement de la suppression de coiffure

if (isset($_POST["supprimer_coiffure"])) {
    $coiffures_a_supprimer = $_POST["coiffures_a_supprimer"];
    foreach ($coiffures_a_supprimer as $coiffure_id) {
        $requete_suppression_coiffure = "DELETE FROM commande_coiffure WHERE id_coiffure = ? and login_coiffeur=?";
        $prepare_suppression_coiffure = $cnx->prepare($requete_suppression_coiffure);
        $prepare_suppression_coiffure->execute([$coiffure_id,$para]);
    }
    header("location: modif_coiffeur.php?param=$para");

}

// $requete = "SELECT * FROM coiffeur WHERE login_coiffeur=?";
// $prepare = $cnx->prepare($requete);
// $execute = $prepare->execute([$para]);
// $coiffeur = $prepare->fetch(PDO::FETCH_ASSOC);

$requete_coiffures_coiffeur = "SELECT coiffure.nom_coiffure,coiffure.id_coiffure 
FROM commande_coiffure 
JOIN coiffure ON commande_coiffure.id_coiffure = coiffure.id_coiffure 
WHERE commande_coiffure.login_coiffeur = ?
";
                $prepare_coiffures_coiffeur = $cnx->prepare($requete_coiffures_coiffeur);
                $prepare_coiffures_coiffeur->execute([$para]);
                $coiffures_coiffeur = $prepare_coiffures_coiffeur->fetchAll(PDO::FETCH_ASSOC);
                */
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Coiffeur</title>
    <!-- Styles Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles personnalisés -->
   <style>
    body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
}

.container {
    width: 50px;
    margin: 50px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
}

h1 {
    text-align: center;
    color: #ff6b6b;
    margin-bottom: 50px;
    font-size: 36px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

.form-group label {
    font-weight: bold;
    color: #4caf50;
    font-size: 18px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

.form-control {
    border: 2px solid #4caf50;
    border-radius: 10px;
    padding: 5px;
    margin-bottom: 30px;
    width: 100%;
    font-size: 16px;
    color: #4caf50;
    background-color: #f8f9fa;
    transition: all 0.3s ease-in-out;
}

.form-control:focus {
    outline: none;
    border-color: #ff6b6b;
    box-shadow: 0px 0px 10px rgba(255, 107, 107, 0.5);
}

.btn {
    border-radius: 20px;
    padding: 15px 30px;
    font-weight: bold;
    margin-top: 30px;
    width: 100%;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 2px;
    transition: all 0.3s ease-in-out;
}

.btn-primary {
    background-color: #ff6b6b;
    border: none;
    color: #fff;
}

.btn-primary:hover {
    background-color: #ff4757;
    transform: scale(1.05);
}

.btn-success {
    background-color: #4caf50;
    border: none;
    color: #fff;
}

.btn-success:hover {
    background-color: #388e3c;
    transform: scale(1.05);
}

.btn-danger {
    background-color: #f44336;
    border: none;
    color: #fff;
}

.btn-danger:hover {
    background-color: #d32f2f;
    transform: scale(1.05);
}

.form-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.form-group.col-md-6 {
    flex-basis: calc(50% - 20px);
    margin-bottom: 30px;
}

.select-multiple {
    height: 200px;
}

.form-check-input {
    margin-right: 20px;
}

   </style>
</head>
<body>
<div style="margin-left:230px;">

@include('header_ad')
<div class="container">
<center> <div>
     <div class="form-group">
        @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
@endif
    <a href="/GESTION_COIFFEUR/liste_coiffeur"> <button class="btn btn-primary"style="color:white;text-decoration:none;font-weight:bold;">Liste coiffeur</button></a>
</div></center>
    <h1 class="mb-4 text-center">Modifier Coiffeur</h1>
    <form action="" method="post">
    @csrf
        <!-- Login -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="login">Login :</label>
                <input type="text" class="form-control" id="login" name="login" value="{{ $coiffeur->login_coiffeur }}" readonly>
            </div>
            <!-- Mot de passe -->
            <div class="form-group col-md-6">
                <label for="mot_pass">Mot de passe :</label>
                <input type="password" class="form-control" id="mot_pass" name="mot_pass" value="{{ $coiffeur->mot_pass_coiffeur }}" required>
            </div>
        </div>
        <!-- Nom et Prénom -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $coiffeur->nom_coiffeur }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $coiffeur->prenom_coiffeur }}" required>
            </div>
        </div>
        <!-- Email et Téléphone -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $coiffeur->email_coiffeur }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="telephone">Téléphone :</label>
                <input type="tel" class="form-control" id="telephone" name="tel" value="{{ $coiffeur->telephone_coiffeur }}" required>
            </div>
        </div>
        <!-- Date de Naissance -->
        <div class="form-group">
            <label for="datenaiss">Date de Naissance :</label>
            <input type="date" class="form-control" id="datenaiss" name="date" value="{{ $coiffeur->datenaiss_coiffeur }}" required>
        </div>

        <!-- Ajouter la liste des coiffures -->
        <div class="form-group">
            <label for="coiffures">Coiffures :</label>
            <select multiple class="form-control" id="coiffures" name="coiffures[]" >
                @foreach($coiffures_coiffeur as $coiffure)
                    <option value="{{ $coiffure->id_coiffure}}">{{ $coiffure->nom_coiffure}}</option>
                @endforeach
            </select>
        </div>

       
    <label for="nouvelle_coiffure">Ajouter une nouvelle coiffure :</label>
    <select id="nouvelle_coiffure" name="nouvelle_coiffure" class="form-control">
        @foreach($coiffures as $coiffure)
            <option value="{{ $coiffure->id_coiffure }}">{{ $coiffure->nom_coiffure }}</option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-success" name="ajouter_coiffure">Ajouter</button>

<div class="form-group">
    <label>Supprimer des coiffures :</label>
    @foreach($coiffures_coiffeur as $coiffure)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{ $coiffure->id_coiffure }}" name="coiffures_a_supprimer[]">
            <label class="form-check-label" for="defaultCheck1">
                {{ $coiffure->nom_coiffure }}
            </label>
        </div>
    @endforeach
</div>

 


<!-- Bouton pour supprimer des coiffures -->
<button type="submit" class="btn btn-danger" name="supprimer_coiffure">Supprimer</button>
        <!-- Bouton Modifier -->
        <button type="submit" class="btn btn-primary btn-block" name="modifier">Modifier</button>
    </form>
 </div>
</div>


</body>
</html>
