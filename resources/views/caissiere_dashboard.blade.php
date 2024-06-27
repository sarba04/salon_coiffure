    <?php

//     include("ctn.php");
//     $sql = "SELECT 
//     rdv.id_rdv,
//     rdv.date_rdv,
//     rdv.login_client,
//     coi.nom_coiffeur,
//     coi.prenom_coiffeur,
//     cli.nom_client,
//     cli.prenom_client
//     FROM 
//     rendez_vous rdv
//     INNER JOIN 
//     coiffeur coi ON rdv.login_coiffeur = coi.login_coiffeur
//     INNER JOIN 
//     client cli ON rdv.login_client = cli.login_client
//     WHERE 
//     rdv.statu_rdv = :statu;
//     ";

// $prepare2 = $cnx->prepare($sql);
// $statut = 'confirmé';
// $prepare2->bindParam(':statu', $statut);
// $prepare2->execute();
    ?>
    
    <!DOCTYPE html>
    <html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Accueil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="styles.css"> <!-- Inclure votre fichier CSS -->
    <style>
    /* Reset CSS */
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    /* Body Styles */
    body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #ff2e63, #fff);
    color: #000;
    }

    /* Sidebar Styles */
    .sidebar {
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    width: 300px;
    background-color: #52057b;
    padding-top: 60px;
    z-index: 1000;
    overflow-y: auto;
    border-right: 5px solid #f0134d;
    }



    .sidebar ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    }

    .sidebar ul li {
    padding: 15px 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }

    .sidebar ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 20px;
    transition: background-color 0.3s ease;
    }

    .sidebar ul li a:hover {
    background-color: rgba(255, 255, 255, 0.3);
    }

    /* Header Styles */
    header {
    background-color: #52057b;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    z-index: 100;
    }

    .logo img {
    max-width: 100px;
    height: auto;
    }

    /* Main Content Styles */
    .dashboard-container {
    margin-left: 300px; /* Largeur de la barre latérale */
    padding: 40px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 30px;
    box-shadow: 0 0 50px rgba(240, 19, 77, 0.7);
    text-align: center;
    }

    h2 {
    color: #f0134d;
    font-size: 54px;
    margin-bottom: 50px;
    text-transform: uppercase;
    letter-spacing: 3px;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    }

    .dashboard-content {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    }

    .summary-box {
    width: 320px;
    padding: 30px;
    margin: 20px;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 30px;
    box-shadow: 0 0 20px rgba(240, 19, 77, 0.7);
    transition: transform 0.5s ease;
    }

    .summary-box:hover {
    transform: scale(1.05);
    }

    .icon {
    font-size: 60px;
    margin-bottom: 30px;
    color: #f0134d;
    }

    .summary-box h3 {
    color: #f0134d;
    font-size: 32px;
    margin-bottom: 30px;
    text-transform: uppercase;
    }

    .summary-box p {
    font-size: 24px;
    line-height: 1.6;
    color: #333;
    }

    @media screen and (max-width: 768px) {
    .dashboard-container {
        margin-left: 0;
    }

    .sidebar {
        width: 100%;
        height: auto;
        padding-top: 20px;
    }
    }
/* Media query pour les petits écrans */
/* Styles CSS supplémentaires */
.menu-toggle {
    display: none;
    background: none;
    border: none;
    color: #fff;
    font-size: 24px;
    cursor: pointer;
}

@media screen and (max-width: 768px) {
    .sidebar {
        display: none;
        position: fixed;
        top: 0;
        left: -300px; /* Cacher initialement le menu latéral */
        width: 300px;
        height: 100%;
        background-color: #52057b;
        transition: left 0.3s ease;
    }

    .sidebar.active {
        left: 0; /* Afficher le menu latéral lorsqu'il est actif */
    }

    .menu-toggle {
        display: block; /* Afficher le bouton de menu pour les petits écrans */
        position: absolute;
        top: 20px;
        left: 20px;
    }

    /* Ajustement de la largeur du contenu principal lorsque le menu est actif */
    .dashboard-container.active {
        margin-left: 300px;
    }
}

/* Styles pour améliorer l'affichage de la table */
.table-responsive {
    margin-top: 20px;
}

.table-striped tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
}

.table-striped tbody tr:hover {
    background-color: #e6e6e6;
}

.table th,
.table td {
    font-size: 16px;
    padding: 10px;
}

.table {
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 0; /* Supprime les espaces à l'intérieur du corps de la carte */
}


    </style>



    </head>
    <body>
    <!-- Barre de navigation latérale -->
    <div class="sidebar" id="sidebar">
        
        <ul id="a">
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="transactions.php">Transactions</a></li>
        <li><a href="clients.php">Clients</a></li>
        <li><a href="produits.php">Produits</a></li>
        <li><a href="rapports.php">Rapports</a></li>
        <li><a href="parametres.php">Paramètres</a></li>
        </ul>
    </div>

    <!-- En-tête -->
  <!-- En-tête -->
<header>
    <div class="logo">
        <img src="logo.png" alt="Logo du salon de coiffure">
    </div>
    <!-- Bouton de menu offcanvas -->
    <button class="menu-toggle"><i class="fas fa-bars"></i></button>
</header>


    <!-- Contenu principal -->
    <div class="dashboard-container">
        <h2>Tableau de Bord - Accueil</h2>
        <div class="dashboard-content">
        <!-- Résumé des ventes -->
        <div class="row " style="width:auto;">
        <div class="col-lg-10">
            <div class="card appointment-table-card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Prochains Rendez-vous Confirmés</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped" style="width:100%;">
    <thead>
        <tr>
            <th>Date</th>
            <th>Client</th>
            <th>Coiffeur</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($reservations as $reservation)
        <tr>
            <td>{{ $reservation->date_rdv }}</td>
            <td>{{ $reservation->nom_client }}</td>
            <td>{{ $reservation->nom_coiffeur }}</td>
            <td>
                <a href='/annuler_rdv/{{ $reservation->id_rdv }}' class="btn btn-danger"><i class="fas fa-times"></i> Annuler</a>
                <a href='/terminer_rdv/{{ $reservation->id_rdv }}' class="btn btn-success"><i class="fas fa-check"></i> Terminer</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Aucun rendez-vous confirmé</td>
        </tr>
        @endforelse
    </tbody>
</table>

                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="summary-box">
            <div class="icon"><i class="fas fa-chart-line"></i></div>
            <h3>Résumé des ventes</h3>
            <p>Total des ventes aujourd'hui : <strong>$500</strong></p>
            <p>Total des ventes cette semaine : <strong>$2500</strong></p>
            <p>Total des ventes ce mois-ci : <strong>$10000</strong></p>
        </div>

        <!-- Prochain rendez-vous -->
        <div class="summary-box">
            <div class="icon"><i class="far fa-calendar-alt"></i></div>
            <h3>Prochain rendez-vous</h3>
            <p>Nom du client : <strong>John Doe</strong></p>
            <p>Date et heure : <strong>2024-04-01 10:00</strong></p>
            <p>Service : <strong>Coupe de cheveux</strong></p>
        </div>

        <!-- Alertes -->
        <div class="summary-box">
            <div class="icon"><i class="fas fa-exclamation-circle"></i></div>
            <h3>Alertes</h3>
            <p>Niveau de stock bas pour le produit X</p>
            <p>Transaction en attente de paiement pour le client Y</p>
            <p>...</p>
        </div>
        </div>
    </div>
   <script>
    document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const menuToggle = document.querySelector('.menu-toggle');
    const dashboardContainer = document.querySelector('.dashboard-container');

    menuToggle.addEventListener('click', function() {
        sidebar.classList.toggle('active');
        dashboardContainer.classList.toggle('active');
    });
});

   </script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </body>
    </html>
