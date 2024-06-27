<?php
session_start();
include('ctn.php');
$sql = "SELECT * FROM coiffure";
$prepare = $cnx->prepare($sql);
$prepare->execute();
$coiffures = $prepare->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Coiffures</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
       
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }
        h1 {
            margin-bottom: 20px;
            text-align: center;
        }
        .coiffure-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }
        .coiffure-item h2 {
            margin-top: 0;
            color: #333;
        }
        .coiffure-item p {
            margin-bottom: 0;
            color: #666;
        }
        .btn-modify, .btn-delete {
            margin-top: 5px;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .btn-modify {
            background-color: #4CAF50;
            color: white;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
            margin-left: 5px;
        }
    </style>
</head>
<body>
<div style="margin-left:230px;">
    <?php include("../header_ad.php") ?>
    <center> <div>
    <a href="ajout_coiffure.php"> <button class="btn btn-primary"style="color:white;text-decoration:none;font-weight:bold;"> Ajouter une nouvelle caissière</button></a>
</div></center>
   <h2>liste coiffure</h2>
<div class="container">
    <?php foreach ($coiffures as $coiffure): ?>
        <div class="coiffure-item">
            <h2><?php echo $coiffure['nom_coiffure']; ?></h2>
            <p>ID : <?php echo $coiffure['id_coiffure']; ?></p>
            <p>Prix : <?php echo $coiffure['prix_coiffure']; ?> fr</p>
            <a href="modif_coiffure.php?param=<?php echo $coiffure['id_coiffure']; ?>"><button class="btn-modify"><i class="fas fa-edit"></i> Modifier</button></a>
            <a href="delete_coiffure.php?param=<?php echo $coiffure['id_coiffure']; ?>" onclick="return confirm('Voulez-vous supprimer ?')"><button class="btn-delete"><i class="fas fa-trash-alt"></i> Supprimer</button></a>
        </div>
    <?php endforeach; ?>
</div>
</div>
</body>
</html>

++02