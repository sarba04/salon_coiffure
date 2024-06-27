
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
      margin-left: 220px;
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

  </style>
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="photos_users/zakaria.jpg" class="user-image" alt="photo">
            <span class="hidden-xs">{{ session('nom_admin') }} {{ session('prenom_admin') }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <div class="user-header">
              <img src="photos_users/zakaria.jpg" class="img-circle" alt="User Image">
              <p>
              {{ session('nom_admin') }} {{ session('prenom_admin') }}
              </p>
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
        <a class="nav-link" href="/admin_dashboard">Tableau de board</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Parametre
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
          <a class="dropdown-item" href="#">Administrateur</a>
          <a class="dropdown-item" href="../PARAM_COIFFURE/liste_coiffure.php">Coiffure</a>
          <a class="dropdown-item" href="../GESTION_DISPONIBILITE/dispo_actu.php">Disponibilité</a>
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



  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


<!-- Popper.js (nécessaire pour Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>