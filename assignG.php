<?php 
include("connexion.php");
if(!empty($_POST["gestion"]))
    $gestion = $_POST["gestion"];
else
    exit("set a market's admin");
if(!empty($_POST["market"]))
    $market = $_POST["market"];
else
    exit("set a market");
$sql = "UPDATE gestionnaire SET id_market='$market' WHERE id_user='$gestion';";

    $result = mysqli_query($link, $sql);
if($result)
    header("location: assignAdmin.php");
else
    exit("something is wrong try again");


?>