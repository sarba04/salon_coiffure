<?php
// session_start();

// // Inclure le fichier de connexion à la base de données
// include('ctn.php');

// // Vérifier si le client est connecté
// if(isset($_SESSION['login_client'])) {
//     // Récupérer le login du client connecté
//     $login_client = $_SESSION['login_client'];

//     // Requête SQL pour récupérer les informations sur les réservations du client
//     $sql = "SELECT 
//                 rdv.date_rdv, 
//                 coi.nom_coiffeur, 
//                 rdv.nom_coiffure, 
//                 coif.prix_coiffure,
//                 rdv.statu_rdv 
//             FROM 
//                 rendez_vous rdv
//             INNER JOIN 
//                 coiffeur coi ON rdv.login_coiffeur = coi.login_coiffeur
//             INNER JOIN 
//                 coiffure coif ON coif.nom_coiffure = rdv.nom_coiffure
//             WHERE 
//                 rdv.login_client = :login_client";

    
//     // Préparation de la requête
//     $prepare = $cnx->prepare($sql);
    
//     // Exécution de la requête en passant le login du client en paramètre
//     $execute = $prepare->execute(['login_client' => $login_client]);
    
//     // Vérifier si la requête s'est bien déroulée
//     if($execute) {
//         // Récupération des résultats
//         $reservations = $prepare->fetchAll(PDO::FETCH_ASSOC);
//     }
// }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des réservations à venir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            color: #212529;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 15px;
        }

        .reservation {
            background-color: #fff;
            border-radius: 10px;
            margin-bottom: 30px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .date {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
            text-align: center;
            margin-bottom: 10px;
        }

        .details {
            font-size: 1.2rem;
            color: #495057;
            margin-bottom: 8px;
            text-align: center;
        }

        .price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #28a745;
            text-align: right;
        }

        .status {
            font-size: 1.1rem;
            font-weight: bold;
            color: #dc3545;
            text-align: center;
            margin-top: 15px;
        }

        .icon {
            font-size: 1.5rem;
            margin-right: 5px;
            color: #007bff;
            vertical-align: middle;
        }

        .btn-new-reservation {
            margin-top: 30px;
            font-size: 1rem;
            padding: 12px 25px;
            border-radius: 25px;
            background-color: #007bff;
            color: #fff;
            border: none;
            transition: background-color 0.3s ease;
            display: block;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            width: 60%;
        }

        .btn-new-reservation:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
@include('header')
<div class="container">
    <h1 class="text-center mb-4">Historique des réservations à venir</h1>
    <div class="row">
        <div class="col-md-8 mx-auto">
         
    @if (!empty($en_attente))
        <h2 class="mt-4">Réservations en attente</h2>
        <ul class="list-group mb-4">
            @foreach ($en_attente as $reservation)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $reservation->date_rdv }} - {{ $reservation->nom_coiffure }} ({{ $reservation->nom_coiffeur }})</span>
                    <span class="badge bg-warning text-dark">{{ $reservation->statu_rdv }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    @if (!empty($annulees))
        <h2 class="mt-4">Réservations annulées</h2>
        <ul class="list-group mb-4">
            @foreach ($annulees as $reservation)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $reservation->date_rdv }} - {{ $reservation->nom_coiffure }} ({{ $reservation->nom_coiffeur }})</span>
                    <span class="badge bg-danger">{{ $reservation->statu_rdv }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    @if (!empty($confirmees))
        <h2 class="mt-4">Réservations confirmées</h2>
        <ul class="list-group mb-4">
            @foreach ($confirmees as $reservation)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $reservation->date_rdv }} - {{ $reservation->nom_coiffure }} ({{ $reservation->nom_coiffeur }})</span>
                    <span class="badge bg-success">{{ $reservation->statu_rdv }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    @if (!empty($terminees))
        <h2 class="mt-4">Réservations terminées</h2>
        <ul class="list-group mb-4">
            @foreach ($terminees as $reservation)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $reservation->date_rdv }} - {{ $reservation->nom_coiffure }} ({{ $reservation->nom_coiffeur }})</span>
                    <span class="badge bg-secondary">{{ $reservation->statu_rdv }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    @if (empty($en_attente) && empty($annulees) && empty($confirmees) && empty($terminees))
    <p class="text-center">Aucune réservation à afficher pour le moment.</p>
@endif

    <a href="{{ route('compte_cl') }}" class="btn btn-primary btn-lg btn-new-reservation mt-4">Faire une nouvelle réservation</a>
</div>

    </div>
</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>

