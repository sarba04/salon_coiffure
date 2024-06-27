<?php
// session_start();
// include("../ctn.php");
// // Vérifie si le formulaire de réservation a été soumis
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reserver"])) {
//     // Vérifie si les données du formulaire sont présentes et non vides
//     if (isset($_POST['jour']) && isset($_POST['heure']) && isset($_POST['coiffeur']) && isset($_POST['client'])) {
//         // Récupération des données du formulaire
//         $jour = $_POST['jour'];
//         $heure = $_POST['heure'];
//         $coiffeur = $_POST['coiffeur'];
//         $client_login = $_POST['client']; // Le client est identifié uniquement par son login

//         // Assurez-vous que les données sont sécurisées avant de les utiliser dans la requête SQL

//         // Statut de la réservation (peut être "en attente", "confirmée", etc.)
//         $statutRdv = "en attente";

//         // Concaténation de la date et de l'heure pour obtenir la date complète du rendez-vous
//         $selectedDayTime = $jour . ' ' . $heure;

//         // Récupération du nom de la coiffure sélectionnée
//         $coiffure_id = $_POST['coiffure'];
//         $sql_coiffure = "SELECT nom_coiffure FROM coiffure WHERE id_coiffure = ?";
//         $stmt_coiffure = $cnx->prepare($sql_coiffure);
//         $stmt_coiffure->execute([$coiffure_id]);
//         $coiffure_row = $stmt_coiffure->fetch(PDO::FETCH_ASSOC);
//         $nom_coiffure = $coiffure_row['nom_coiffure'];

//         // Requête SQL pour insérer une nouvelle réservation dans la table "rendez-vous"
//         $requete_reservation = "INSERT INTO rendez_vous (date_rdv, statu_rdv, login_coiffeur, login_client, nom_coiffure) 
//                                 VALUES (?, ?, ?, ?, ?)";

//         // Préparation de la requête
//         $stmt = $cnx->prepare($requete_reservation);

//         // Liaison des valeurs aux paramètres de la requête
//         $stmt->bindParam(1, $selectedDayTime);
//         $stmt->bindParam(2, $statutRdv);
//         $stmt->bindParam(3, $coiffeur);
//         $stmt->bindParam(4, $client_login);
//         $stmt->bindParam(5, $nom_coiffure);

//         // Exécution de la requête
//         if ($stmt->execute()) {
//             // La réservation a été ajoutée avec succès
//             // Redirection vers une page de confirmation ou autre
//             header("Location:../admin_dashboard.php");
//             exit;
//         } else {
//             // Une erreur s'est produite lors de l'insertion
//             echo "Une erreur s'est produite lors de l'insertion de la réservation.";
//         }
//     } else {
//         // Les données du formulaire sont manquantes ou vides
//         echo "Veuillez remplir tous les champs du formulaire.";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de rendez-vous</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
        }

        form {
            width: 500px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            background: linear-gradient(to bottom, #2980b9, #3498db);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 36px;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
            font-size: 18px;
            color: #fff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        select,
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: #fff;
            color: #2980b9;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        select:focus,
        input[type="submit"]:hover {
            background-color: #2980b9;
            color: #fff;
        }

        input[type="submit"] {
            background-color: #c0392b;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #e74c3c;
        }

        /* Ajout d'une touche supplémentaire */
        input[type="submit"] {
            text-transform: uppercase;
            letter-spacing: 2px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
<div class="container" style="margin-left:200px;">
@include('header_ad')
    <h1>Réservation de rendez-vous</h1>@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <form id="reservationForm" method="" action="">
    @csrf
    <!-- Coiffure selection -->
<!-- Coiffure selection -->
<label for="coiffure">Choisissez une coiffure :</label>


<select name="coiffure" id="coiffure">
    @foreach ($coiffures as $coiffure)
        <option value="{{ $coiffure->id_coiffure }}" {{ $coiffure->id_coiffure == $selectedCoiffure ? 'selected' : '' }}>{{ $coiffure->nom_coiffure }}</option>
    @endforeach
</select>

<!-- Coiffeur selection -->
<label for="coiffure">Choisissez un coiffeur :</label>

<select name="coiffeur" id="coiffeur">
    @foreach ($coiffeurs as $coiffeur)
        <option value="{{ $coiffeur->login_coiffeur }}" {{ $coiffeur->login_coiffeur == $selectedCoiffeur ? 'selected' : '' }}>{{ $coiffeur->nom_coiffeur }} {{ $coiffeur->prenom_coiffeur }}</option>
    @endforeach
</select>

<!-- Jour selection -->
<label for="coiffure">Choisissez un jour :</label>

<select name="jour" id="jour">
    @foreach ($jours as $jour)
        <option value="{{ $jour }}" {{ $jour == $selectedDay ? 'selected' : '' }}>{{ $jour }}</option>
    @endforeach
</select>

<!-- Heure selection -->
<label for="coiffure">Choisissez une heure :</label>

<select name="heure" id="heure">
    @foreach ($heures as $heure)
        <option value="{{ $heure }}" {{ $heure == $selectedHeure ? 'selected' : '' }}>{{ $heure }}</option>
    @endforeach
</select>

<label for="coiffure">Choisissez une client :</label>

<select name="client" id="client">
    @foreach ($clients as $client)
        @php
            $selected = (old('client') == $client['login_client']) ? 'selected' : '';
        @endphp
        <option value="{{ $client['login_client'] }}" {{ $selected }}>{{ $client['login_client'] }}</option>
    @endforeach
</select>


   
<div><input type="submit" id="en" value="envoyer"></div> 


</form>
<form id="hiddenDataForm" action="" method="post" style="display: none;">
    @csrf
    <input type="hidden" name="coiffure" value="{{ $selectedCoiffure }}">
    <input type="hidden" name="coiffeur" value="{{ $selectedCoiffeur }}">
    <input type="hidden" name="jour" value="{{ $selectedDay }}">
    <input type="hidden" name="heure" value="{{ $selectedHeure }}">

</form>

<script>
    document.getElementById('en').addEventListener('click', function(event) {
        event.preventDefault(); // Empêcher la soumission du formulaire reservationForm
        document.getElementById('hiddenDataForm').submit(); // Soumettre le formulaire hiddenDataForm
    });
</script>
   
   
    <script>
    document.getElementById('coiffure').addEventListener('change', function() {
        document.getElementById('reservationForm').submit();
    });

    document.getElementById('coiffeur').addEventListener('change', function() {
        document.getElementById('reservationForm').submit();
    });

    document.getElementById('jour').addEventListener('change', function() {
        document.getElementById('reservationForm').submit();
    });
</script>

</body>
</html>
