<!DOCTYPE html>
<html lang="fr">
<head>
<!-- <link rel="stylesheet" href="styles.css"> -->

<style>
    body {
    font-family: 'Comic Sans MS', cursive, sans-serif;
    background: linear-gradient(45deg, #FFC0CB, #FFC0CB);
    margin: 0;
    padding: 0;
}

.container {
    margin: 50px auto;
    padding: 30px;
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

h1 {
    text-align: center;
    color: #9b59b6;
    font-size: 2.5em;
    margin-bottom: 30px;
}

form {
    margin-top: 20px;
}

fieldset {
    border: none;
}

legend {
    font-size: 1.8em;
    color: #9b59b6;
    font-weight: bold;
    margin-bottom: 20px;
    text-transform: uppercase;
    text-align: center;
}

label {
    display: block;
    margin-bottom: 10px;
    color: #9b59b6;
}

input[type="text"],
input[type="password"],
input[type="email"],
input[type="tel"],
input[type="date"] {
    width: calc(100% - 24px);
    padding: 15px;
    margin-bottom: 20px;
    border: none;
    border-bottom: 2px solid #9b59b6;
    outline: none;
    font-size: 1.2em;
    transition: border-bottom-color 0.3s;
}

input[type="text"]:focus,
input[type="password"]:focus,
input[type="email"]:focus,
input[type="tel"]:focus,
input[type="date"]:focus {
}

button[type="submit"] {
    width: 100%;
    padding: 20px;
    background-color: #9b59b6;
    color: #fff;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    font-size: 1.5em;
    text-transform: uppercase;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #8e44ad;
}
body {
    font-family: 'Comic Sans MS', cursive, sans-serif;
    background-color: #f9ecf2;
    margin: 0;
    padding: 0;
}

.container {
    width: 600px;
    margin:-10px auto;
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

    <main>
    <h1 style="float:left;"><a href="/index">accueil</a></h1>

        <div class="container">
            <h1>Inscription au Salon de Coiffure</h1>
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

          

            <form action="" method="post">
                @csrf
                <fieldset>
            <legend>Informations de connexion</legend>
            <label for="login_client">Nom d'utilisateur :</label>
            <input type="text" id="login_client" name="login_client" required>
            <label for="mot_pass_client">Mot de passe :</label>
            <input type="password" id="mot_pass_client" name="mot_pass_client" required>
        </fieldset>

        <fieldset>
            <legend>Informations personnelles</legend>
            <label for="nom_client">Nom :</label>
            <input type="text" id="nom_client" name="nom_client" required>
            <label for="prenom_client">Prénom :</label>
            <input type="text" id="prenom_client" name="prenom_client" required>
            <label for="datenaiss_client">Date de naissance :</label>
            <input type="date" id="datenaiss_client" name="datenaiss_client" required>
        </fieldset>

        <fieldset>
            <legend>Contact</legend>
            <label for="email_client">Email :</label>
            <input type="email" id="email_client" name="email_client" required>
            <label for="telephone_client">Téléphone :</label>
            <input type="tel" name="telephone_client" >           
                   <button type="submit">S'inscrire</button>
            </form>
            <p>Vous avez déjà un compte ? <a href="/connexion_cl">Connectez-vous ici</a></p>
        </div>
    </main>

    <footer>
        <!-- Include your footer content here -->
    </footer>
</body>
</html>
