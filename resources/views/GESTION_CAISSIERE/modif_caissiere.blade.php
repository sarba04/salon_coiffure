<?php
// session_start();

// include ("ctn.php");
// $para=$_GET["param"];

// if(isset($_POST["login"])){
//     $log=$_POST["login"];
//     $nom=$_POST["nom"];
//     $prenom=$_POST["prenom"];
//     $date=$_POST["date"];
//     $telephone=$_POST["tel"];
//     $email=$_POST["email"];
    
//     // Requête de mise à jour des informations de la caissière
//     $requete="UPDATE caissière 
//                 SET 
                    
//                    login_caissière=?,
//                     nom_caissière=?,
//                     prenom_caissière=?,
//                     datenaiss_caissière=?,
//                     telephone_caissière=?,
//                     email_caissière=?
//                 WHERE login_caissière=?";
//     $prepare=$cnx->prepare($requete);
//     $tab=[$log,$nom,$prenom,$date,$telephone,$email,$para];
//     $execute=$prepare->execute($tab);
//     if($execute==1){
//         echo("Modification effectuée avec succès");
//         header("Location: liste_caiss.php");
//     }else{
//         echo("Échec de la modification");
//     }
// }

// // Récupérer les informations de la caissière à modifier
// $requete="SELECT * FROM caissière WHERE login_caissière=?";
// $prepare=$cnx->prepare($requete);
// $execute=$prepare->execute([$para]);
// $caissiere=$prepare->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une caissière</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #00bcd4 0%, #3f51b5 100%);
            height: 100vh;
            align-items: center;
            justify-content: center;
        }
        .container {
            margin-top:20px;
            width: 100px;
            padding: 30px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }
        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 40px rgba(0, 0, 0, 0.3);
        }
        .container h2 {
            text-align: center;
            color: #3f51b5;
            margin-bottom: 30px;
        }
        .form-group label {
            color: #3f51b5;
            font-weight: bold;
        }
        .form-control {
            border-radius: 20px;
            transition: all 0.3s ease;
            background-color: #f5f5f5;
            border: none;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-control:focus {
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            border-radius: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            background-color: #3f51b5;
            border: none;
        }
        .btn-primary:hover {
            background-color: #00bcd4;
            transform: translateY(-2px);
        }
        .btn-primary:active {
            transform: translateY(2px);
        }
    </style>
</head>
<body>
<div style="margin-left:230px;">
@include('header_ad')
    <center> <div>
    <a href="/GESTION_CAISSIERE/liste_caissière"> <button class="btn btn-primary"style="color:white;text-decoration:none;font-weight:bold;">Liste des caissières</button></a>
</div></center>
<div class="container">
    <h2> Modifier caissière</h2>
    <div class="form-group">
        @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="row">
    <div class="col-md-6">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="login">Login :</label>
                <input type="text" id="login" name="login" class="form-control" value="{{ $caissiere->login_caissière }}" readonly >
            </div>

            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" value="{{ $caissiere->nom_caissière }}">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" value="{{ $caissiere->prenom_caissière }}">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Modifier</button>
        </form>
    </div>
    <div class="col-md-6">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Date de naissance :</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ $caissiere->datenaiss_caissière }}">
            </div>

            <div class="form-group">
                <label for="tel">Téléphone :</label>
                <input type="tel" id="tel" name="tel" class="form-control" value="{{ $caissiere->telephone_caissière }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $caissiere->email_caissière }}" required>
            </div>
            <button type="reset" class="btn btn-primary btn-block">Réinitialiser</button>
        </form>
    </div>
</div>

</div>

</body>
</html>
