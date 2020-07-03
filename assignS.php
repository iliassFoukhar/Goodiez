<?php 
include("connexion.php");
if(!empty($_POST["livreur"]))
    $livreur = $_POST["livreur"];
else
    exit("please set a delivery guy");
if(!empty($_POST["commande"]))
    $commande = $_POST["commande"];
else
    exit("please set a market");

$sql = "UPDATE livreur SET state=2 WHERE id_user='$livreur';";
$sql2 = "UPDATE commande SET command_state=1 WHERE id_commande='$commande';";

    $result = mysqli_query($link, $sql);
    $result1 = mysqli_query($link, $sql2);
if($result &&$result1)
    header("location: assignAdmin.php");
else
    exit("something is wrong try again");


?>