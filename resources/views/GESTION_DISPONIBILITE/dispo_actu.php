<?php
// Inclure le fichier de connexion
include("../ctn.php");

// Liste des jours de la semaine
$jours_semaine = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');

// Boucle pour traiter chaque jour de la semaine
foreach ($jours_semaine as $jour) {
    // Requête SQL pour récupérer les disponibilités pour le jour actuel
    $sql = "SELECT heure FROM disponibilité WHERE jour = :jour ORDER BY heure";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':jour', $jour, PDO::PARAM_STR);
    $stmt->execute();
    $disponibilites = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Affichage de l'emploi du temps pour le jour actuel
    echo "<h2>$jour</h2>";
    if (count($disponibilites) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Heure</th><th>Disponibilité</th></tr>";
        for ($heure = 8; $heure <= 18; $heure++) {
            $heure_format = sprintf("%02d", $heure) . ":00";
            $heure_suivante = sprintf("%02d", $heure + 1) . ":00";
            $heure_affichee = sprintf("%02d", $heure) . ":30";
            $heure_suivante_affichee = sprintf("%02d", $heure) . ":30";
            echo "<tr>";
            echo "<td>$heure_format - $heure_suivante</td>";
            echo "<td>";
            if (in_array($heure_format, $disponibilites)) {
                echo "Disponible";
            } else {
                echo "-";
            }
            if (in_array($heure_affichee, $disponibilites)) {
                echo ", $heure_affichee";
            }
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Aucune disponibilité trouvée pour $jour.</p>";
    }
}

// Fermeture de la connexion à la base de données
$cnx = null;
?>
