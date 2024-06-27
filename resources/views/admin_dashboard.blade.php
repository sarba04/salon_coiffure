<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Link Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    /* Sidebar Styling */
    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 100;
      padding-top: 48px;
      width: 220px;
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.1);
    }

    /* Main Content Styling */
    .main-content {
      margin-left: 20px;
      padding: 20px;
    }

    /* Sidebar Header Styling */
    .sidebar-header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 48px;
      background-color: #007bff;
      color: #fff;
      text-align: center;
      line-height: 48px;
      z-index: 101;
    }

    /* Sidebar Links Styling */
    .sidebar .nav-link {
      font-weight: 500;
      color: #333;
    }

    .sidebar .nav-link:hover {
      color: #007bff;
    }

    /* Active Sidebar Link Styling */
    .sidebar .nav-link.active {
      color: #007bff;
    }

    /* Navigation Bar Styling */
    .navbar {
      background-color: #007bff;
      margin-left:210px;
    }

    .navbar-brand {
      color: #fff;
      font-weight: bold;
    }

    .navbar-nav .nav-item .nav-link {
      color: #fff;
      font-weight: 500;
    }

    .navbar-nav .nav-item .nav-link:hover {
      color: rgba(255, 255, 255, 0.8);
    }

    /* Page Title Styling */
    .page-title {
      font-size: 24px;
      margin-bottom: 20px;
    }

    /* Content Card Styling */
       /* Content Card Styling */
       .content-card {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    /* Card Title Styling */
    .card-title {
      font-size: 20px;
      margin-bottom: 15px;
    }

    /* Card Content Styling */
    .card-content {
      font-size: 18px;
    }

    /* Responsive Sidebar Styling */
    @media (max-width: 768px) {
      .sidebar {
        position: static;
        height: auto;
        width: 100%;
        padding-top: 0;
        box-shadow: none;
      }
      .main-content {
        margin-left: 0;
      }
    }


    /* Main Content Styling */
.main-content {
  margin-left: 220px;
  padding: 20px;
}

/* Page Title Styling */
.page-title {
  font-size: 36px;
  color: #333;
  margin-bottom: 40px;
}

/* Content Cards Styling */
.row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin-bottom: 30px;
}

.col-md-4 {
  flex: 0 0 calc(33.333% - 20px);
  margin-bottom: 20px;
}
.content-card {
        background-color: #f5f5f5;
        color: #333;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease;
    }

    .content-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    .content-card h2 {
        font-size: 24px;
        margin-bottom: 10px;
        color: #333;
    }

    .content-card p {
        font-size: 18px;
        color: #666;
    }

    /* Style pour les icônes */
    .card-icon {
        font-size: 36px;
        margin-bottom: 20px;
        color: #007bff;
    }

    /* Style pour les titres */
    .page-title {
        font-size: 36px;
        margin-bottom: 30px;
        color: #333;
        text-transform: uppercase;
    }

    table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .appointment-card {
    transition: transform 0.3s ease;
}

.appointment-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}
.appointment-card {
    border-radius: 25px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
}

.card-header {
    border-radius: 25px 25px 0 0;
}

.card-body {
    border-radius: 0 0 25px 25px;
}

.btn {
    border-radius: 20px;
    margin-left: 10px;
}

.media-body {
    position: relative;
}

.media-body .btn {
    position: absolute;
    bottom: 0;
    right: 0;
}


  </style>
</head>
<body>
  <!-- Navigation Bar -->

  @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
@if(session('success2'))
    <script>
        alert("{{ session('success2') }}");
    </script>
@endif
@if(session('success3'))
    <script>
        alert("{{ session('success3') }}");
    </script>
@endif
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Admin  </a>
    <a href="{{ url('GESTION_RDV/ajout_rdv') }}" class="btn btn-primary ml-auto" style="font-weight:bold;font-size:50px;">Nouvelle reservation</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>            
    <div class="navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="photos_users/zakaria.jpg" class="user-image" alt="photo">
            <span class="hidden-xs">{{ session('nom_admin')}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <div class="user-header">
              <img src="photos_users/zakaria.jpg" class="img-circle" alt="User Image">
              <p>
              {{ session('nom_admin'),session('nom_admin') }}              </p>
            </div>
            <div class="user-footer">
              <a href="?home=profil" class="btn btn-info btn-block">Modifier Profil</a>
              <form method="" action="/logout">
                <input type="submit" class="btn btn-danger btn-block" value="Deconnexion" name="deconnexion"> 
              </form>
            </div>
          </div>
        </li>
      </ul>
    </div>
  
    <nav class="col-md-2 col-sm-12 bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="admin_dashboard.php">Tableau de board</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Parametre
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
          <a class="dropdown-item" href="#">Administrateur</a>
          <a class="dropdown-item" href="PARAM_COIFFURE/liste_coiffure">Coiffure</a>
          <a class="dropdown-item" href="GESTION_DISPONIBILITE/dispo_actu">Disponibilité</a>
          <a class="dropdown-item" href="PARAM_COIFFURE/coiffeur_coiffure">coiffeur_coiffure</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Enregistrement
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
          <a class="dropdown-item" href="{{ url('GESTION_CLIENT/gestion_cl') }}">Gestion client</a>
          <a class="dropdown-item" href="{{ url('GESTION_COIFFEUR/liste_coiffeur') }}">Gestion coiffeur</a>
          <a class="dropdown-item" href="{{ url('GESTION_CAISSIERE/liste_caissière') }}">Gestion caissiere  </a>
        </div>
      </li>
  
    </ul>
  </div>
</nav>
</nav>




  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content">
    <div class="page-title">Dashboard</div>
    

    <!-- Content Cards -->
    <div class="row">
    <!-- Carte pour afficher le nombre de réservations -->
    <div class="col-md-4">
        <div class="content-card">
            <h2>Réservations</h2>
            <p>Nombre de réservations : {{ $total_reservations }}</p>
            <i class="fas fa-calendar-alt card-icon"></i>
            <a href="{{ url('GESTION_RDV/reservations') }}" class="btn-details">Détails <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    <!-- Carte pour afficher le nombre total de clients -->
    <div class="col-md-4">
        <div class="content-card">
            <h2>Clients</h2>
            <p>Nombre total de clients : {{ $total_clients }}</p>
            <i class="fas fa-users card-icon"></i>
            <a href="{{ url('GESTION_CLIENT/gestion_cl') }}" class="btn-details">Détails <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    <!-- Carte pour afficher le nombre total de coiffeurs -->
    <div class="col-md-4">
        <div class="content-card">
            <h2>Coiffeurs</h2>
            <p>Nombre total de coiffeurs : {{ $total_coiffeurs }}</p>
            <i class="fas fa-cut card-icon"></i>
            <a href="{{ url('GESTION_COIFFEUR/liste_coiffeur') }}" class="btn-details">Détails <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    <!-- Carte pour afficher le nombre total de caissières -->
    <div class="col-md-4">
        <div class="content-card">
            <h2>Caissières</h2>
            <p>Nombre total de caissières : {{ $total_caissieres }}</p>
            <i class="fas fa-cash-register card-icon"></i>
            <a href="{{ url('GESTION_CAISSIERE/liste_caissière') }}" class="btn-details">Détails <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    <!-- Ajoutez d'autres cartes pour afficher d'autres informations -->
</div>


<div class="row" style="width:auto;">
    <div class="col-lg-10">
        <div class="card appointment-table-card">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center">Prochains Rendez-vous Confirmés</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Client</th>
                                <th>Coiffeur</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
    @forelse($rdvsConfirmes as $rdvConf)
        <tr>
            <td>{{ $rdvConf->date_rdv }}</td>
            <td>
                @isset($rdvConf->client)
                    {{ $rdvConf->client->nom_client }}
                @else
                    Client non trouvé
                @endisset
            </td>
            <td>{{ $rdvConf->coiffeur->nom_coiffeur }}</td>
            <td>
                <a href='/annuler_rdv/{{ $rdvConf->id_rdv }}' class="btn btn-danger"><i class="fas fa-times"></i> Annuler</a>
                <a href='/terminer_rdv/{{ $rdvConf->id_rdv }}' class="btn btn-success"><i class="fas fa-check"></i> Terminer</a>
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


<h1>Liste des rendez-vous en attente</h1>
<!-- Laravel Blade Template -->

<div class="row">
    @forelse($rdvsAttente as $rdvAtt)
        <div class="col-md-4 mb-4">
            <div class="card appointment-card rounded shadow">
                <div class="card-body">
                    <h5 class="card-title text-center">Rendez-vous</h5>
                    <p class="card-text text-muted text-center">Date: {{ $rdvAtt->date_rdv }}</p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="m-0">Client:</h6>
                            @if($rdvAtt->client) <!-- Vérifie si un client est associé -->
                                <p class="m-0">{{ $rdvAtt->client->nom_client }}</p>
                            @else
                                <p class="m-0">Client non trouvé</p>
                            @endif
                        </div>
                        <div>
                            <h6 class="m-0">Coiffeur:</h6>
                            @if($rdvAtt->coiffeur) <!-- Vérifie si un coiffeur est associé -->
                                <p class="m-0">{{ $rdvAtt->coiffeur->nom_coiffeur }}</p>
                            @else
                                <p class="m-0">Coiffeur non trouvé</p>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href='/annuler_rdv/{{ $rdvAtt->id_rdv }}' class="btn btn-danger mr-2"><i class="fas fa-times"></i> Annuler</a>

                        <form method="POST" action="{{ route('confirmer_rdv', ['id' => $rdvAtt->id_rdv]) }}">
    @csrf
    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Confirmer</button>
</form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-md-12 text-center">
            <p>Aucun rendez-vous en attente.</p>
        </div>
    @endforelse
</div>




</main>



  <!-- Bootstrap JS, Popper.js, and jQuery -->
  
 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


<!-- Popper.js (nécessaire pour Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>



