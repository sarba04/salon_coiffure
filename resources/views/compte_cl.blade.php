
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <title>Salon de Coiffure XYZ</title>
    <link rel="stylesheet" href="{{ asset('css/styl.css') }}">
    <style>
    
/* Global Styles */


      
        .container {
    padding-top: 50px;
}

.hairstyle {
    border: 3px solid transparent;
    border-radius: 20px;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.9);
    transition: border-color 0.3s ease, transform 0.3s ease;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
    margin-bottom: 40px;
    transform-style: preserve-3d;
}

.hairstyle:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: radial-gradient(circle, rgba(255,255,255,0.7), transparent);
    pointer-events: none;
}

.hairstyle img {
    width: 100%;
    border-radius: 20px;
    filter: grayscale(100%) contrast(150%) brightness(120%);
    transition: filter 0.3s ease;
}

.hairstyle .price {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    color: #ff4081;
    font-weight: bold;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 10px 20px;
    border-radius: 20px;
    opacity: 0;
    transform: translateY(-50px);
    transition: opacity 0.5s ease, transform 0.5s ease;
}

.hairstyle:hover {
    border-color: #ff4081;
    transform: rotateY(15deg) rotateX(-10deg) scale(1.1);
}

.hairstyle:hover img {
    filter: grayscale(0%) contrast(100%) brightness(100%);
}

.hairstyle:hover .price {
    opacity: 1;
    transform: translateY(0);
}

.hairstyle h2 {
    font-size: 36px;
    margin-top: 0;
    color: #ff4081;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    transform: translateY(-20px);
    transition: transform 0.5s ease;
}

.hairstyle:hover h2 {
    transform: translateY(-30px);
}

.hairstyle p {
    font-size: 18px;
    margin-bottom: 0;
    color: #777;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-weight: bold;
    font-style: italic;
} */

    </style>
</head>
<body>
    @include('header') 

    <main>
        <div class="container">
            <h1 class="text-center mb-4">Coiffures</h1>
            <div class="row">
                @foreach($coiffures as $coiffure)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="hairstyle">
                        <h2>{{ $coiffure->nom_coiffure }}</h2>
                        <h2>{{ $coiffure->id_coiffure }}</h2>
                        <p class="price">Prix : {{ $coiffure->prix_coiffure }}fr</p>
                        <form  action="choixx/" method="">
                            @csrf
                            <input type="hidden" name="nom_coiffure" value="{{ $coiffure->nom_coiffure }}">
                            <input type="hidden" name="id_coiffure" value="{{ $coiffure->id_coiffure }}">
                            <input type="hidden" name="prix_coiffure" value="{{ $coiffure->prix_coiffure }}">
                            <button type="submit" class="btn btn-primary" name="envoyer">Choisir cette coiffure</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- Inclure les bibliothèques JavaScript -->
</body>
</html>
