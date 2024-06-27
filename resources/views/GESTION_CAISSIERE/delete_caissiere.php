<?php 
    include ("ctn.php");
    $para=$_GET["param"];
    $requete="DELETE FROM caissière WHERE login_caissière=?";
    $prepare=$cnx->prepare($requete);
    $execute=$prepare->execute([$para]);
    header("location:liste_caiss.php");
?>