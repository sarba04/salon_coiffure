<?php 
// session_start();
// include('../ctn.php');
// $sql = "SELECT * FROM rendez_vous";
// $prepare = $cnx->prepare($sql);
// $prepare->execute();
// $rendez_vous = $prepare->fetchAll(PDO::FETCH_ASSOC);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des rendez-vous</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:(even) {
            background-color: #f2f2f2;
        }
        .en-attente {
            background-color: #ffc107; /* couleur jaune pour les rendez-vous en attente */
            color: #000; /* couleur du texte */
        }
        .annulé {
            background-color: #dc3545; /* couleur rouge pour les rendez-vous annulés */
            color: #fff; /* couleur du texte */
        }
        .confirmé {
            background-color: #28a745; /* couleur verte pour les rendez-vous confirmés */
            color: #fff; /* couleur du texte */
        }
        .terminé {
            background-color: #007bff; /* couleur bleue pour les rendez-vous terminés */
            color: #fff; /* couleur du texte */
        }
        .actions a {
            margin-right: 5px;
            text-decoration: none;
            color: #007bff;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div style="margin-left:230px;">

@include('header_ad')    
<h1 style="text-align: center;">Liste des rendez-vous</h1>
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Statut</th>
            <th>Coiffeur</th>
            <th>Client</th>
            <th>Caissière</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rendez_vous as $rdv)
        <tr class="{{ strtolower(str_replace(' ', '-', $rdv->statu_rdv)) }}">
            <td>{{ $rdv->id_rdv }}</td>
            <td>{{ $rdv->date_rdv }}</td>
            <td>{{ $rdv->statu_rdv }}</td>
            <td>{{ $rdv->login_coiffeur }}</td>
            <td>{{ $rdv->login_client }}</td>
            <td>{{ $rdv->login_caissière }}</td>
            <td class="actions">
                <a href="" style="color:white;">Modifier</a>
                <a href="" style="color:white;">Supprimer</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
</body>
</html>
