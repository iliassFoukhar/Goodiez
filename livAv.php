<?php 
session_start();
include("connexion.php");
$sql = "UPDATE livreur SET state = 1;";
if(mysqli_query($link, $sql))
    header("location: index.php");

?>