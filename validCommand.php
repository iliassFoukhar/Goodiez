<?php
    session_start();
    include("connexion.php");
    $idCommand = $_GET["id"];
    $idUser = $_SESSION["id"];
    $sql = "UPDATE commande SET command_state=3 WHERE id_commande='$idCommand' AND id_client = '$idUser';";
    if(mysqli_query($link, $sql))
        header("location: cart.php");
?>