<?php 
    include ("ctn.php");
    $para=$_GET["param"];
    $requete="DELETE FROM coiffure WHERE id_coiffure=?";
    $prepare=$cnx->prepare($requete);
    $execute=$prepare->execute([$para]);
    header("location:liste_coiffure.php");
?>