
<?php
/*
session_start();

    include ("ctn.php");
    $para=$_GET["param"];
    

    if(isset($_POST["login"])){
        $log=$_POST["login"];
        $nom=$_POST["nom"];
        $prenoms=$_POST["prenom"];
        $date=$_POST["date"];
        $telephone=$_POST["tel"];
        $adresse=$_POST["adresse"];
        $requete="UPDATE client 
                    SET 
                        nom_client=?,
                        prenom_client=?,
                        datenaiss_client=?,
                        telephone_client=?,
                        email_client=?
                    WHERE login_client=?";
        $prepare=$cnx->prepare($requete);
        $tab=[$nom,$prenoms,$date,$telephone,$adresse,$log,];
        $execute=$prepare->execute($tab);
        if($execute==1){
            echo("Modification effectué avec succes");
        }else{
            echo("echec de la modification");
        }
    }
    $requete="SELECT*FROM client WHERE login_client=?";
    $prepare=$cnx->prepare($requete);
    $execute=$prepare->execute([$para]);
    $client=$prepare->fetch(PDO::FETCH_ASSOC); */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un client</title>
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
    <a href="/GESTION_CLIENT/gestion_cl"> <button class="btn btn-primary"style="color:white;text-decoration:none;font-weight:bold;">Liste client</button></a>
</div></center>
<div class="container">
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <h2> Modifier client</h2>
    <div class="row">
    <div class="col-md-6">
        <form action="" method="POST">
            @csrf <!-- Ajoutez ceci pour la protection CSRF dans les formulaires Laravel -->
            <div class="form-group">
                <label for="login">Login :</label>
                <input type="text" id="login" name="login" class="form-control" value="{{ $client->login_client }}" >
            </div>

            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" value="{{ $client->nom_client }}">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" value="{{ $client->prenom_client }}">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Modifier</button>

        </form>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">Date de naissance :</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ $client->datenaiss_client }}">
        </div>

        <div class="form-group">
            <label for="tel">Téléphone :</label>
            <input type="tel" id="tel" name="tel" class="form-control" value="{{ $client->telephone_client }}" required>
        </div>
        <div class="form-group">
            <label for="adresse">Email :</label>
            <input type="text" id="ad" name="adresse" class="form-control" value="{{ $client->email_client }}" required>
        </div>
        <button type="reset" class="btn btn-primary btn-block">Réinitialiser</button>
    </div>
</div>

</div>
</div>


</body>
</html>