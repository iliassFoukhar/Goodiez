<?php 
include("connexion.php");
session_start();
$idUser = $_SESSION["id"];
$sql = "DELETE FROM cart WHERE id_user ='$idUser';";
if(mysqli_query($link, $sql))
{
    header("location: cart.php");
}

?>