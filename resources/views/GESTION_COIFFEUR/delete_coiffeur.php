<?php 
    include ("../ctn.php");
    $para=$_GET["param"];
    $requete="DELETE FROM coiffeur WHERE login_coiffeur=?";
    $prepare=$cnx->prepare($requete);
    $execute=$prepare->execute([$para]);
    header("location:liste_coiffeur.php");
?>