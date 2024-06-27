<?php 
// session_start();
// include ("ctn.php");

// if(isset($_POST["login"])) {
//     $log=$_POST["login"];
//     $password=$_POST["password"];
//     $nom=$_POST["nom"];
//     $prenoms=$_POST["prenom"];
//     $date=$_POST["date"];
//     $telephone=$_POST["tel"];
//     $adresse=$_POST["adresse"];
    
//     // Vérifier si le login existe déjà
//     $sql_verification = "SELECT COUNT(*) FROM caissière WHERE login_caissière = ?";
//     $prepare_verification = $cnx->prepare($sql_verification);
//     $prepare_verification->execute([$log]);
//     $result_verification = $prepare_verification->fetchColumn();

//     if($result_verification > 0) {
//         echo "<script>alert('Ce login existe déjà. Veuillez en choisir un autre.');</script>";

//     } else {
//         // Insertion du nouveau client
//         $requete_insert = "INSERT INTO caissière VALUES(?,?,?,?,?,?,?)";
//         $prepare_insert = $cnx->prepare($requete_insert);
//         $tab = [$log,$password,$nom,$prenoms,$adresse,$telephone,$date];
//         $execute = $prepare_insert->execute($tab);

//         if($execute==1){
//             echo "Ajout effectué avec succès";
//         } else {
//             echo "Échec de l'enregistrement";
//         }
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un client</title>
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
@include('header_ad');
    <center> <div>
    <a href="/GESTION_CAISSIERE/liste_caissière"> <button class="btn btn-primary"style="color:white;text-decoration:none;font-weight:bold;">Liste caissiere</button></a>
</div></center>
<div class="container">
    <h2>Ajouter une nouvelle caissière</h2>
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="row">
        <div class="col-md-6">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="login">Login :</label>
                    <input type="text" id="login" name="login" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="date">Date de naissance :</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
        </div>
        <div class="col-md-6">
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tel">Téléphone :</label>
                    <input type="tel" id="tel" name="tel" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse :</label>
<input type="email" name="adresse"class="form-control">                </div>
                <button type="submit" class="btn btn-primary btn-block" >Ajouter</button>
            </form>
        </div>
    </div>
</div>
</div>

</body>
</html>
