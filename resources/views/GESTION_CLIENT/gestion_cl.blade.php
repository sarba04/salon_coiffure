
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des clients</title>
    <style>
         .btn-primary {
            border-radius: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            background-color: #3f51b5;
            border: none;
        }
        .btn-primary:hover {
            background-color: #00bcd4;
            transform: translateY(-2px);
        }
        .btn-primary:active {
            transform: translateY(2px);
        }


        
    </style>
      <style>
        /* Styles supplémentaires */
        .coiffeur-box {
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 20px;
            position: relative; /* Ajout de position relative pour positionner les boutons */
        }

        .coiffeur-initials {
            width: 50px;
            height: 50px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            line-height: 50px;
            font-size: 20px;
            border-radius: 50%;
            display: inline-block;
        }

        .coiffeur-details {
            display: inline-block;
            vertical-align: top;
            width: calc(100% - 100px); /* Ajustement de la largeur pour laisser de la place aux boutons */
        }

        .coiffeur-fullname {
            font-weight: bold;
        }

        .btn-modify {
            background-color: #ffc107;
            color: #212529;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            margin-right: 5px;
            position: absolute; /* Positionnement absolu */
            top: 50%; /* Alignement vertical */
            transform: translateY(-50%); /* Correction pour le centrage vertical */
            right: 50px; /* Distance du bord droit */
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            position: absolute; /* Positionnement absolu */
            top: 50%; /* Alignement vertical */
            transform: translateY(-50%); /* Correction pour le centrage vertical */
            right: 10px; /* Distance du bord droit */
        }
    </style>
</head>
<body>
    <div style="margin-left:230px;">
    @include('header_ad') 


    <h2>Liste des clients</h2>
    @if(session()->has('success2'))
    <div class="alert alert-success">
        {{ session('success2') }}
    </div>
@endif
@if(session()->has('delete'))
    <div class="alert alert-success">
        {{ session('delete') }}
    </div>
@endif

    <center> <div>
    <a href="/GESTION_CLIENT/ajout_client"> <button class="btn btn-primary"style="color:white;text-decoration:none;font-weight:bold;"> Ajouter un nouveau client</button></a>
</div></center>
   
<br>

<table id="liste" style="width:90%" class="table table-striped table-bordered">
        <thead>
        <tr bgcolor="lightblue">
                <th>Login</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Date de naissance</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
            <tr>
                <td>{{ $client->login_client }}</td>
                <td>{{ $client->nom_client }}</td>
                <td>{{ $client->prenom_client }}</td>
                <td>{{ $client->email_client }}</td> 
                <td>{{ $client->telephone_client }}</td>
                <td>{{ $client->datenaiss_client }}</td>
                <td> <a href="/GESTION_CLIENT/modif_cl/{{$client->login_client}}"><button style="color:green; font-size:30px;"><i class="fas fa-edit"></i></button></a></td>

                <td> <a href="/GESTION_CLIENT/delete_cl/{{$client->login_client}}" onclick="if(confirm('voulez vous supprimer ?')){}else{return false}" > <button style="color:red;font-size:30px;"><i class="fas fa-trash-alt"></i></button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
   
  
    </div>
</body>
</html>
