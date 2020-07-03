<?php 
session_start();
include("connexion.php");
$sql = "UPDATE livreur SET state = 1;";
$idLivreur = $_SESSION["id"];
$sql1 = "UPDATE commande SET command_state = 2, id_livreur = NULL WHERE id_livreur = '$idLivreur';";
if(mysqli_query($link, $sql) && mysqli_query($link, $sql1))
    header("location: index.php");

?>