<?php
session_start();
include('ctn.php');

// Sélectionner tous les jours disponibles
$requete_jours = "SELECT DISTINCT jour FROM disponibilité";
$prepare_jours = $cnx->prepare($requete_jours);
$prepare_jours->execute();
$jours_disponibles = $prepare_jours->fetchAll(PDO::FETCH_ASSOC);

// Sélectionner tous les créneaux disponibles
$requete_creneaux = "SELECT jour, heure FROM disponibilité";
$prepare_creneaux = $cnx->prepare($requete_creneaux);
$prepare_creneaux->execute();
$creneaux_disponibles = $prepare_creneaux->fetchAll(PDO::FETCH_ASSOC);

// Organiser les créneaux par jour pour faciliter l'affichage
$creneaux_par_jour = [];
foreach ($creneaux_disponibles as $creneau) {
    $jour = $creneau['jour'];
    $heure = $creneau['heure'];
    $creneaux_par_jour[$jour][] = $heure;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disponibilités des coiffeurs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .day-buttons {
            text-align: center;
            margin-bottom: 20px;
        }

        .day-button {
            padding: 10px 20px;
            margin: 0 5px;
            font-size: 16px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f0f0f0;
            transition: background-color 0.3s;
        }

        .day-button:hover {
            background-color: #e0e0e0;
        }

        .timeslots {
            display: none;
            margin-top: 20px;
        }

        .timeslots.active {
            display: block;
        }

        .timeslot-button {
            padding: 5px 10px;
            margin: 5px;
            font-size: 14px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #f0f0f0;
            transition: background-color 0.3s;
        }

        .timeslot-button:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
<?php include('header.php'); ?> <!-- Inclure l'en-tête -->
 
<div class="container">
    <h1>Disponibilités des coiffeurs</h1>
    <div class="day-buttons">
        <?php foreach ($jours_disponibles as $jour) { ?>
            <button class="day-button" data-day="<?php echo $jour['jour']; ?>"><?php echo $jour['jour']; ?></button>
        <?php } ?>
    </div>

    <?php foreach ($creneaux_par_jour as $jour => $creneaux) { ?>
        <div class="timeslots" data-day="<?php echo $jour; ?>">
            <h2><?php echo $jour; ?></h2>
            <div class="timeslot-buttons">
                <?php foreach ($creneaux as $creneau) { ?>
                    <button class="timeslot-button"><?php echo $creneau; ?></button>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

    <!-- Formulaire pour envoyer les données sélectionnées à une autre page -->
    <form action="choix_coiffeur.php" method="POST">
    <input type="hidden" id="selected-day" name="selected_day">
    <input type="hidden" id="selected-time" name="selected_time">
    <input type="hidden" name="jour" value="<?php echo $jour; ?>">
    <input type="hidden" name="creneau" value="<?php echo $creneau; ?>">
    <button type="submit">Valider</button>
</form>

</div>

<script>
    // Script JavaScript pour gérer la sélection du jour et de l'heure
    document.querySelectorAll('.day-button').forEach(button => {
        button.addEventListener('click', () => {
            const selectedDay = button.dataset.day;
            document.getElementById('selected-day').value = selectedDay;
        });
    });

    document.querySelectorAll('.timeslot-button').forEach(button => {
        button.addEventListener('click', () => {
            const selectedTime = button.textContent;
            document.getElementById('selected-time').value = selectedTime;
        });
    });
</script>


    <script>
        // Votre JavaScript ici
        document.addEventListener('DOMContentLoaded', function() {
            const dayButtons = document.querySelectorAll('.day-button');
            const timeslots = document.querySelectorAll('.timeslots');

            dayButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const selectedDay = this.dataset.day;

                    // Masquer tous les créneaux
                    timeslots.forEach(slot => {
                        slot.classList.remove('active');
                    });

                    // Afficher les créneaux correspondant au jour sélectionné
                    const selectedTimeslots = document.querySelector(`.timeslots[data-day="${selectedDay}"]`);
                    if (selectedTimeslots) {
                        selectedTimeslots.classList.add('active');
                    }
                });
            });
        });
    </script>
</body>
</html>
