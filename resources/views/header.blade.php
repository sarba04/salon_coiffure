<!-- header.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon de Coiffure XYZ</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assurez-vous d'ajouter votre propre fichier de styles CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <style>
    
/* Global Styles */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  width: 80%;
  margin: auto;
  overflow: hidden;
}

/* Header Styles */
header {
  background-color: #007bff;
  color: #fff;
  padding: 20px 0;
}

header h1 {
  margin: 0;
}

header nav ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

header nav ul li {
  display: inline;
  margin-right: 20px;
}

header nav ul li a {
  color: #fff;
  text-decoration: none;
  transition: color 0.3s ease;
}

header nav ul li a:hover {
  color: #f8f9fa;
}

/* Button Styles */

/* Offcanvas Styles */
.offcanvas-header {
  background-color: #007bff;
  color: #fff;
}

.offcanvas-body {
  padding: 20px;
}


    header{
    position:fixed;
    position:absolute;
}
        nav {
    background: linear-gradient(135deg, #ff007f, #7a00cc);
    color: #fff;
   
}

       

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 24px;
            transition: color 0.3s ease;
            position: relative;
        }

        nav ul li a::before {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #fff;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        nav ul li a:hover::before {
            transform: scaleX(1);
        }
 .a {
            margin-left: auto; /* Push the button to the right */
            margin-right:20px;
            list-style: none; 
        }


        body {
            padding-top: 20px;
            background-color: #f3f3f3;
        }

      
     

    </style>
   
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a href="#" style="font-size:50px; text-decoration:none;">Salon de Coiffure</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="">
                    <a href="/compte_cl">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="#nos-services"></a>
                </li>
                <li class="nav-item">
                    <a href="#a-propos-de-nous"></a>
                </li>
                <li class="nav-item">
                    <a href="#temoignages"></a>
                </li>
                <li class="nav-item">
                    <a href="#contactez-nous"></a>
                </li>
                <li class="nav-item user-button"> <!-- Added class "user-button" to the list item -->
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-user"></i></button>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">PROFIL</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="profil">
            <i class="fas fa-user" style="font-size:60px; border-radius:0px; background-color:black; color:white;"></i>
            <span>{{ session('nom_client') }}</span>
            <div>{{ session('email_client') }}</div>
        </div><br>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <a href="{{ route('profil_client') }}">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                        <i class="fas fa-user"></i> Profil
                    </button>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('reservation_cl') }}">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        Réservation
                    </button>
                </a>
            </li>
        </ul>
        <a href="/logout" style="color:red;"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
