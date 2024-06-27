<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon de Coiffure XYZ</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <style>
        /* Styles CSS supplémentaires pour la personnalisation */
        /* Ajoutez vos styles personnalisés ici */
       /* Styles CSS audacieux pour la personnalisation */

  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7;
    color: #333;
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



section {
    padding: 0px ;
    text-align: center;
    overflow: hidden;
}

.container {
    margin: 0 auto;
    padding: 0 20px;
}
.container,h4{
    float:left;
}
h2 {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 50px;
    position: relative;
    z-index: 1;
    color: #333;
}

p {
    font-size: 20px;
    line-height: 1.6;
    margin-bottom: 30px;
    color: #666;
}

.cta-button {
    display: inline-block;
    background-color: #ff007f;
    color: #fff;
    text-decoration: none;
    font-size: 24px;
    font-weight: 700;
    padding: 20px 40px;
    border-radius: 50px;
    transition: background-color 0.3s ease;
}

.cta-button:hover {
    background-color: #7a00cc;
}

/* Styles pour le service */
.service {
    background-color: #f9f9f9;
    padding: 80px 0;
}

.service .section-header p {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

.service .section-header h2 {
    font-size: 48px;
    font-weight: bold;
    color: #333;
    margin-bottom: 40px;
}

.service .service-item {
    background-color: #fff;
    padding: 40px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.service .service-item:hover {
    transform: translateY(-10px);
}

.service .service-item h3 {
    color: #333;
    font-size: 28px;
    margin-top: 20px;
}

.service .service-item p {
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 30px;
    color: #666;
}

.service .service-item a.btn {
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 30px;
    padding: 15px 30px;
    font-size: 20px;
    text-transform: uppercase;
    transition: background-color 0.3s ease;
}

.service .service-item a.btn:hover {
    background-color: #555;
}

.team-member {
    text-align: center;
    position: relative;
    z-index: 1;
}

.team-member img {
    border-radius: 50%;
    max-width: 200px;
    margin-bottom: 20px;
    border: 5px solid #ff007f;
    transition: transform 0.3s ease;
}

.team-member img:hover {
    transform: scale(1.1) rotate(10deg);
}



footer {
    background: linear-gradient(135deg, #ff007f, #7a00cc);
    color: #fff;
    text-align: center;
    padding: 20px 0;
    width: 100%;
    bottom: 0;
    z-index: 1000;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.5);
}

.jumbotron {
    margin-top:-30px;
    height:500px;
      background-image: url('couverture.jpeg');
      background-size: cover;
      background-position: center;
      color: #fff;
      padding: 100px 0;
      text-align: center;
    }
    .jumbotron h1 {
      font-size: 4rem;
      font-weight: bold;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    .jumbotron p {
      font-size: 1.5rem;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    } 

   /* Styles CSS pour la section Avis Clients */
   #avis {
    background-image: linear-gradient(to bottom, #ff00ff, #00ffff);
}


h2 {
    text-align: center;
    font-size: 50px;
    color: #fff;
    margin-bottom: 50px;
    text-transform: uppercase;
    letter-spacing: 5px;
    font-family: 'Comic Sans MS', cursive;
}

.testimonial {
    text-align: center;
    padding: 30px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 30px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    margin-bottom: 60px;
    position: relative;
    overflow: hidden;
    transition: transform 0.4s ease-in-out;
}

.testimonial img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 20px;
    border: 5px solid #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
}

.testimonial p {
    font-size: 20px;
    color: #333;
    line-height: 1.6;
    margin-bottom: 20px;
    font-family: 'Verdana', sans-serif;
}

.testimonial h3 {
    font-size: 30px;
    color: #000;
    margin: 0;
    font-family: 'Comic Sans MS', cursive;
}

/* Effet de survol */

.testimonial:hover {
    transform: translateY(-10px);
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.7);
}

/* Animation d'entrée */

.testimonial:nth-child(odd) {
    animation: bounceInLeft 1s ease-in-out;
}

.testimonial:nth-child(even) {
    animation: bounceInRight 1s ease-in-out;
}

@keyframes bounceInLeft {
    from {
        opacity: 0;
        transform: translateX(-100%) scale(0.5);
    }
    to {
        opacity: 1;
        transform: translateX(0) scale(1);
    }
}

@keyframes bounceInRight {
    from {
        opacity: 0;
        transform: translateX(100%) scale(0.5);
    }
    to {
        opacity: 1;
        transform: translateX(0) scale(1);
    }
}
/* contactez nous */
#contact-info {
  background-color: #f8f9fa;
  color: #333;
  overflow: hidden;
}

.contact-title {
  color: #0056b3;
  font-weight: 700;
  letter-spacing: 2px;
  position: relative;
}

.contact-title::after {
  content: '';
  position: absolute;
  left: 50%;
  bottom: -10px;
  transform: translateX(-50%);
  height: 4px;
  width: 50%;
  background-color: #0056b3;
}

.contact-details {
  background: white;
  padding: 2cm;
  border-radius: 0.5rem;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
height: 100%;}

.contact-details:hover {
  box-shadow: 0 8px 25px rgba(0,0,0,0.2);
  transform: translateY(-20px);
  background-color: #dceff4;
}

.info-item {
  font-size: 25px;
  margin-bottom: 1rem;
  align-items: center;
}

.icon-holder {
  width: 25px;
  text-align: center;
  margin-right: 10px;
  color: #0056b3;
}
 
    </style>
</head>
<body>
    <main>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a  href="#" style="font-size:50px; text-decoration:none;  ">Salon de Coiffure</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="">
          <a href="#accueil">Accueil</a>
        </li>
        <li class="nav-item">
          <a href="#nos-services">Services</a>
        </li>
        <li class="nav-item">
          <a href="#a-propos-de-nous">À Propos</a>
        </li>
        <li class="nav-item">
          <a href="#temoignages">Témoignages</a>
        </li>
        <li class="nav-item">
          <a href="#contactez-nous">Contact</a>
        </li>
        <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Connexion
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/connexion_ad">administration</a>
    <a class="dropdown-item" href="/connexion_cl">client</a>
  </div>
</div>
      </ul>
    </div>
  </nav>
</header>


  <section class="jumbotron">
    <div class="">
      <h1 class="display-4">Bienvenue dans notre Salon de Coiffure</h1>
      <p class="lead">Transformez votre look avec nos experts en coiffure !</p>
      <a href="/connexion_cl" class="btn btn-primary btn-lg">Réservez votre rendez-vous</a>
    </div>
</section>
<section id="nos-services">
<div class="service">
  <div class="container">
      <div class="section-header text-center">
          <p>Explorez nos services</p>
          <h2>Des coupes de cheveux uniques et audacieuses</h2>
      </div>
      <div class="row">
          <div class="col-lg-4 col-md-6">
              <div class="service-item">
                  <div class="service-img">
                      <img src="img/service-1.jpg" alt="Hair Cut">
                  </div>
                  <h3>Coupe de cheveux</h3>
                  <p>Expérimentez avec des coupes de cheveux tendance et stylisées pour un look unique.</p>
                  <a class="btn" href="#">Découvrir</a>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="service-item">
                  <div class="service-img">
                      <img src="img/service-2.jpg" alt="Beard Style">
                  </div>
                  <h3>Style de barbe</h3>
                  <p>Transformez votre look avec des styles de barbe uniques et personnalisés.</p>
                  <a class="btn" href="#">Découvrir</a>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="service-item">
                  <div class="service-img">
                      <img src="img/service-3.jpg" alt="Color & Wash">
                  </div>
                  <h3>Couleur & Lavage</h3>
                  <p>Ajoutez de la couleur et de la vitalité à vos cheveux avec nos services de coloration et de lavage.</p>
                  <a class="btn" href="#">Découvrir</a>
              </div>
          </div>
      </div>
  </div>
</div>
</section>
        <section id="equipe" class="section">
            <div class="container">
                <h2>Notre Équipe</h2>
                <div class="team-grid">
                    <div class="team-member">
                        <img src="coiffeur1.jpg" alt="Coiffeur 1">
                        <h3>Nom du Coiffeur 1</h3>
                        <p>Description du Coiffeur 1. Avec plus de 10 ans d'expérience, Coiffeur 1 maîtrise les dernières tendances et techniques de coiffure pour vous offrir un service personnalisé et de qualité.</p>
                    </div>
                    <div class="team-member">
                        <img src="coiffeur2.jpg" alt="Coiffeur 2">
                        <h3>Nom du Coiffeur 2</h3>
                        <p>Description du Coiffeur 2. Passionné par son métier, Coiffeur 2 met tout en œuvre pour vous offrir une expérience agréable et des résultats à la hauteur de vos attentes.</p>
                    </div>
                    <div class="team-member">
                        <img src="coiffeur3.jpg" alt="Coiffeur 3">
                        <h3>Nom du Coiffeur 3</h3>
                        <p>Description du Coiffeur 3. Toujours à l'écoute de vos besoins, Coiffeur 3 vous propose des conseils personnalisés et des coupes qui reflètent votre style unique.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="temoignages" class="section" style="padding:0px; paddinnf-right:0px;">
            <div class="container">
                <h2>Avis Clients</h2>
                <div class="testimonial">
                    <img src="client1.jpg" alt="Client 1">
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac felis tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas."</p>
                    <h3>Nom du Client 1</h3>
                </div>
                <div class="testimonial">
                    <img src="client2.jpg" alt="Client 2">
                    <p>"Sed dictum, libero sit amet viverra pretium, odio quam malesuada arcu, non accumsan turpis justo a libero. Sed fermentum augue ac mi fermentum, id blandit justo condimentum."</p>
                    <h3>Nom du Client 2</h3>
                </div>
                <!-- Ajoutez d'autres avis clients ici -->
            </div>
        </section>

        <section id="contactez-nous" class="section">
    <div class="container">
        <h2 class="section-title">Contactez-nous</h2>
        <div class="contact-container">
        <div class="container py-5">
    <h2 class="text-center text-uppercase mb-5 contact-title">Contactez-Nous</h2>
    <div class="row">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="contact-details">
          <h3 class="h4 mb-3 text-primary">Informations de Contact</h3>
          <p class="info-item"><span class="icon-holder"><i class="fas fa-map-marker-alt"></i></span>Abobo samake (100m)</p>
          <p class="info-item"><span class="icon-holder"><i class="fas fa-phone"></i></span>+225 05 07 32 70 51</p>
          <p class="info-item"><span class="icon-holder"><i class="fas fa-phone"></i></span>+225 07 481 56408</p>
          <p class="info-item"><span class="icon-holder"><i class="fas fa-envelope"></i></span>info@sc-electroclima.org</p>
          <p class="info-item"><span class="icon-holder"><i class="fas fa-clock"></i></span>Lun - Ven: 9:00 - 17:00</p>
        </div>
      </div>
            <form class="contact-form" action="contact.php" method="post">
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</section>

    </main>

    <footer>
        <p>&copy; 2024 Salon de Coiffure XYZ. Tous droits réservés.</p>
    </footer>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</main>
</body>
</html>
