<?php 
    include ("ctn.php");
    $para=$_GET["param"];
    $requete="DELETE FROM client WHERE login_client=?";
    $prepare=$cnx->prepare($requete);
    $execute=$prepare->execute([$para]);
    header("location:gestion_cl.php");
?>