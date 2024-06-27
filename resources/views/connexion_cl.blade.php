

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion - Salon de Coiffure XYZ</title>
<link rel="stylesheet" href="styles.css"> <!-- Assurez-vous d'ajouter votre propre fichier de styles CSS -->

<style>
body {
    font-family: 'Comic Sans MS', cursive, sans-serif;
    background: linear-gradient(45deg, #FFC0CB, #FFC0CB);
    margin: 0;
    padding: 0;
}

.container {
    
    width: 35%;
    padding: 20px;
    
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    text-align: center;
}

h1 {
    color: #ff00ff;
    font-size: 3em;
    text-transform: uppercase;
    margin-bottom: 30px;
    letter-spacing: 5px;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
}

form {
    max-width: 400px;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 10px;
    color: #ff00ff;
    font-size: 1.2em;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 15px;
    margin-bottom: 20px;
    border: none;
    border-radius: 10px;
    background-color: #fce3f7;
    font-size: 1.2em;
    text-align: center;
}

button[type="submit"] {
    width: 100%;
    padding: 20px;
    background-color: #ff00ff;
    color: #fff;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    font-size: 1.5em;
    text-transform: uppercase;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #cc00cc;
}

p {
    color: #ff00ff;
    font-size: 1.2em;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

a {
    color: #ff00ff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

</style>
</head>
<body>
<header>
      <h1><a href="/index">accueil</a></h1>
<div class="container">
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <h1>Connexion </h1>
    <form action="" method="post">
    @csrf
        <label for="login">Login :</label>
        <input type="text" id="login" name="login_client" required>
        <label for="mot_pass">Mot de passe :</label>
        <input type="password" name="mot_pass_client" required>
        <button type="submit">Se connecter</button>
        <div style="color:red;">
        <?php if(!empty($re)) echo "<h2>$re</h2>"; ?> 
        </div>
    </form>
    <p>Vous n'avez pas de compte ? <a href="/creation_compte">Créer un compte</a></p>
</div>

<script>
// Effet de lumière
setTimeout(() => {
    document.querySelector('.light-effect').remove();
}, 3000); // Supprimez l'effet de lumière après 3 secondes
</script>

</body>
</html>
