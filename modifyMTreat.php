<?php 
    include("connexion.php");
    session_start();
    $adress = $_POST["adress"];
    $description = $_POST["description"];
    $name = $_POST["name"];
    $id = $_SESSION["id"];
    $idMarket = $_COOKIE["idMarket"];
    //Insert everything into the Data Base
     $sqlInsert ="UPDATE market SET name='$name', description='$description', adress='$adress' WHERE id_market=$idMarket";
    //Not do it until everything is set up :
    $resultat = mysqli_query($link,$sqlInsert);
    if($resultat)
    header("location: modifyAdmin.php");
    else
        exit("mistake");
?>