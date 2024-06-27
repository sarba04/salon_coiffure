<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coiffeurs disponibles</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .container {
            margin-top:100px;
            max-width: 800px;
            margin: 50px auto;
        }
        .profile i {
            margin-right: 10px;
            font-size: 36px;
            color: #007bff;
        }
        .profile {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        
        .profile:hover {
            transform: translateY(-5px);
        }
        
        .profile h3 {
            font-size: 28px;
            margin-bottom: 15px;
            color: #343a40;
            text-align: center;
        }
        
        .profile p {
            font-size: 18px;
            margin: 10px 0;
            color: #6c757d;
            text-align: center;
        }
        
        .profile i {
            margin-right: 10px;
            font-size: 24px;
            color: #007bff;
        }
        
        .profile .btn {
            display: block;
            margin: 20px auto 0;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 15px 30px;
            font-size: 20px;
            transition: background-color 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .profile .btn:hover {
            background-color: #0056b3;
        }
        
        .btn-back {
            background-color: #28a745;
            border-color: #28a745;
            transition: background-color 0.3s;
        }
        
        .btn-back:hover {
            background-color: #218838;
        }
    </style></head>
<body>
@include('header') 
    <div class="container" style="margin-top:100px;">
        <h1 class="text-center mb-4">Coiffeurs Disponibles pour la coiffure {{ session('nom_coiffure') }}</h1>
        <div class="row">
            @foreach ($coiffeurs_dispo as $coiffeur)
                <div class="col-md-4 mb-4">
                    <div class="profile">
                        <h3><i class="fas fa-user"></i> {{ $coiffeur->nom_coiffeur }} {{ $coiffeur->prenom_coiffeur }}</h3>
                        <p><i class="fas fa-phone"></i> {{ $coiffeur->telephone_coiffeur }}</p>
                        <form action="/dispo_coiff" method="">
                            @csrf
                            <input type="hidden" name="selected_coiffeur" value="{{ $coiffeur->login_coiffeur }}">
                            <button type="submit" class="btn btn-primary" name="a">Choisir</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Inclure les scripts -->
</body>
</html>


