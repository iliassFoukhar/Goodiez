<?php 
    include("connexion.php");
    
    $id = $_GET["id"];
    //Insert everything into the Data Base
     $sqlInsert ="DELETE FROM livreur WHERE id_user=$id;";
    $sql2 = "DELETE FROM user WHERE id_user='$id';";
    //Not do it until everything is set up :
    $resultat = mysqli_query($link,$sqlInsert);
    $resultat2 = mysqli_query($link,$sql2);
    if($resultat && $resultat2)
    header("location: modifyAdmin.php");
    else
        exit("mistake");
?>