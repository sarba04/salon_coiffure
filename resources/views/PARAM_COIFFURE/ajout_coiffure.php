<?php 
session_start();
include ("ctn.php");

if(isset($_POST["id_coiffure"])) {
    $id=$_POST["id_coiffure"];
    $nom=$_POST["nom_coiffure"];
    $prix=$_POST["prix_coiffure"];
    
    // Vérifier si l'identifiant existe déjà
    $sql_verification = "SELECT COUNT(*) FROM coiffure WHERE id_coiffure = ?";
    $prepare_verification = $cnx->prepare($sql_verification);
    $prepare_verification->execute([$id]);
    $result_verification = $prepare_verification->fetchColumn();

    if($result_verification > 0) {
        echo "<script>alert('Cet identifiant de coiffure existe déjà. Veuillez en choisir un autre.');</script>";

    } else {
        // Insertion de la nouvelle coiffure
        $requete_insert = "INSERT INTO coiffure (id_coiffure, nom_coiffure, prix_coiffure) VALUES (?,?,?)";
        $prepare_insert = $cnx->prepare($requete_insert);
        $tab = [$id, $nom, $prix];
        $execute = $prepare_insert->execute($tab);

        if($execute==1){
            echo "Ajout effectué avec succès";
        } else {
            echo "Échec de l'enregistrement";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Coiffure</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
            font-size: 28px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .form-container {
            width: 80%;
            margin: 0 auto;
        }
        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            color: #555;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        input[type="text"]:focus {
            outline: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            display: block;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div style="margin-left:230px;">
    <?php include("../header_ad.php") ?>
    <center> <div>
    <a href="liste_coiffure.php"> <button class="btn btn-primary"style="color:white;text-decoration:none;font-weight:bold;"> Liste coiffure</button></a>
</div></center>
<div class="container">
    <h1>Ajouter une nouvelle Coiffure</h1>
    <div class="form-container">
        
        <form method="POST">
            <label for="id_coiffure">Identifiant Coiffure :</label>
            <input type="text" id="id_coiffure" name="id_coiffure" >

            <label for="nom_coiffure">Nom de la Coiffure :</label>
            <input type="text" id="nom_coiffure" name="nom_coiffure" >

            <label for="prix_coiffure">Prix de la Coiffure :</label>
            <input type="text" id="prix_coiffure" name="prix_coiffure" >

            <input type="submit" value="Ajouter">
        </form>
    </div>
</div>
</body>
</html>