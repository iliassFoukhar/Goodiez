<?php 
    include("connexion.php");
    
    $idMarket = $_GET["id"];
    //Insert everything into the Data Base
     $sqlInsert ="DELETE FROM market WHERE id_market=$idMarket";
    //Not do it until everything is set up :
    $resultat = mysqli_query($link,$sqlInsert);
    if($resultat)
    header("location: modifyAdmin.php");
    else
        exit("mistake");
?>