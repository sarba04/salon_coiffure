<?php
// session_start();

// include("header.php");
// include 'ctn.php';

// // Vérifier si le login_coiffeur est défini dans la session
// if (isset($_SESSION['login_coiffeur'])) {
//     // Récupérer le login_coiffeur depuis la session
//     $login_coiffeur = $_SESSION['login_coiffeur'];

//     // Requête SQL pour récupérer les disponibilités uniques (jours) associées au login_coiffeur
//     $sql_jours = "SELECT DISTINCT jour FROM Disponibilité INNER JOIN coiffeur_disponibilité ON Disponibilité.id_dispo = coiffeur_disponibilité.id_dispo WHERE coiffeur_disponibilité.login_coiffeur = ?";
//     $stmt_jours = $cnx->prepare($sql_jours);
//     $stmt_jours->execute([$login_coiffeur]);
//     $jours = $stmt_jours->fetchAll(PDO::FETCH_COLUMN);

//     // Requête SQL pour récupérer les heures disponibles pour chaque jour
//     $heures = array();
//     foreach ($jours as $jour) {
//         $sql_heures = "SELECT heure FROM Disponibilité INNER JOIN coiffeur_disponibilité ON Disponibilité.id_dispo = coiffeur_disponibilité.id_dispo WHERE coiffeur_disponibilité.login_coiffeur = ? AND Disponibilité.jour = ?";
//         $stmt_heures = $cnx->prepare($sql_heures);
//         $stmt_heures->execute([$login_coiffeur, $jour]);
//         $heures[$jour] = $stmt_heures->fetchAll(PDO::FETCH_COLUMN);
//     }
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $jour = $_POST['jour'] ;
//     $heure = $_POST['heure'] ;
//     $coiff=$_SESSION["login_coiffeur"];
//     $log_cl=$_SESSION['login_client'];
//     $nom_c=$_SESSION['nom_coiffure'];
//     $id_c=$_SESSION['id_coiffure'] ;
//     $p_c= $_SESSION['prix_coiffure'];

//     // Statut de la réservation (peut être "en attente", "confirmée", etc.)
//     $statutRdv = "en attente";
//     $selectedDayTime = $jour . ' ' . $heure;
//     // Requête SQL pour insérer une nouvelle réservation dans la table "rendez-vous"
//            $requete_reservation="INSERT INTO rendez_vous(date_rdv,statu_rdv,login_coiffeur,login_client,nom_coiffure) VALUES(?,?,?,?,?) ";


//     // Préparer la requête
//    // Préparer la requête
// $prepare_reservation = $cnx->prepare($requete_reservation);
// $tab=[$selectedDayTime,$statutRdv,$coiff,$log_cl,$nom_c];
// // Concaténer le jour et l'heure sélectionnés pour former une seule chaîne de date et heure
// $execute=$prepare_reservation->execute($tab);
// if($execute){
   
//         // Rediriger vers une page de confirmation ou de remerciement
//         echo '<script>alert("Succès ! reservation effectuer.");</script>';
//     } else {
//         // Gérer le cas où les champs nécessaires ne sont pas définis
//         echo "Certains champs sont manquants.";
//     }

// }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de coiffeur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #f0f0f0;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            padding: 40px;
            width: 400px;
            text-align: center;
        }

        h1, h2 {
            color: #007bff;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: left;
        }

        li {
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .time-slot {
            display: inline-block;
            margin-right: 10px;
        }

        /* Style pour mettre en surbrillance le bouton sélectionné */
        .selected {
            background-color: #28a745; /* Couleur verte */
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container button {
            margin-top: 20px;
        }

        /* Style pour le formulaire de réservation */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-size: 16px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            margin-top: 5px;
            text-align: left;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: #007bff;
        }

        .form-select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
           
            background-position: calc(100% - 10px) center;
            background-size: 20px;
            margin-top: 5px;
            text-align: left;
            transition: border-color 0.3s;
        }

        .form-select:focus {
            outline: none;
            border-color: #007bff;
        }

        .form-select option {
            color: #333;
        }
    </style>
</head>
<body>
<div class="container">
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <h1>Réservation de coiffeur</h1>

    <form method="post" action="">
    @csrf
    <div class="form-group">
        <label for="jour" class="form-label">Choisissez un jour :</label>
        <select id="jour" name="jour" class="form-select" onchange="showHours(this.value)">
            @if(isset($jours) && !empty($jours))
                @foreach($jours as $jour)
                    <option value="{{ $jour }}">{{ $jour }}</option>
                @endforeach
            @else
                <option value="">Aucune disponibilité trouvée</option>
            @endif
        </select>
    </div>
    <div id="hours-container" style="display: none;">
        <div class="form-group">
            <label for="heure" class="form-label">Choisissez une heure :</label>
            <select id="heure" name="heure" class="form-select" onchange="selectHour(this)">
                <!-- Les options d'heure seront chargées dynamiquement via JavaScript -->
            </select>
        </div>
    </div>
    <div class="button-container">
        <button type="submit" id="reserve-btn" name="reserve" disabled>Réserver</button>
        <button id="cancel-btn" onclick="cancel()" disabled>Annuler</button>
    </div>
</form>


    
</div>
<script>
    function showHours(jour) {
        // Réinitialiser la liste des heures
        document.getElementById('heure').innerHTML = '<option value="">Choisissez une heure</option>';

        if (jour) {
            // Afficher les heures disponibles pour le jour sélectionné
            var heures = <?php echo json_encode($heures); ?>;
            var hoursContainer = document.getElementById('hours-container');
            var selectHour = document.getElementById('heure');

            if (heures[jour]) {
                for (var i = 0; i < heures[jour].length; i++) {
                    var option = document.createElement('option');
                    option.text = heures[jour][i];
                    selectHour.add(option);
                }
                hoursContainer.style.display = 'block';
            } else {
                hoursContainer.style.display = 'none';
            }
        } else {
            hoursContainer.style.display = 'none';
        }
    }

    function selectHour(select) {
        // Activer les boutons de réservation et d'annulation une fois qu'une heure est sélectionnée
        document.getElementById('reserve-btn').disabled = false;
        document.getElementById('cancel-btn').disabled = false;
    }

    function reserve() {
        // Vous pouvez ajouter ici le code pour gérer la réservation
        alert('Fonction de réservation à implémenter');
    }

    function cancel() {
        // Vous pouvez ajouter ici le code pour annuler la réservation
        alert('Fonction d\'annulation à implémenter');
    }
</script>
</body>
</html>

