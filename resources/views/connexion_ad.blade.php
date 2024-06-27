


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion Administration</title>
  <!-- Inclure Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Comic Sans MS', cursive, sans-serif;
      background: linear-gradient(45deg, #FFC0CB, #FFC0CB);
    }

    .container {
      max-width: 400px;
      margin: 100px auto;
      padding: 40px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      position: relative;
    }

    h2 {
      color: #ff00ff;
      font-size: 2em;
      text-transform: uppercase;
      margin-bottom: 20px;
      margin-top: 0;
      letter-spacing: 5px;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      color: #333;
      font-size: 18px;
      margin-bottom: 10px;
    }

    input,
    select {
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fce3f7;
    }

    button[type="submit"] {
      padding: 12px;
      background-color: #FF69B4;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 20px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
      background-color: #FF1493;
      transform: scale(1.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Connexion Administration</h2>
    <form action="" method="post">
    @csrf
      <label for="login">login :</label>
      <input type="text" id="username" name="login" required>
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required>
      <label for="role">Choisissez votre rôle :</label>
      <select id="role" name="role" required>
        <option value="administrateur">Administrateur</option>
        <option value="caissiere">Caissière</option>
        <option value="coiffeur">Coiffeur</option>
      </select>
      <button type="submit" class="btn btn-primary" name="envoyer">Se connecter</button>
    </form>
    <!-- Utilisation du bouton flèche Bootstrap -->
    <a href="index.php" class="btn btn-outline-secondary mt-3">&#8592; Retour</a>
  </div>
  <!-- Inclure Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
