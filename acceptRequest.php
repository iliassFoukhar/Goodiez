<?php 
include("connexion.php");
$idM = $_GET["id"];
$idA = $_SESSION["id"];
$sqlM = "UPDATE market SET valider=1, added_by='$idA' WHERE id_market ='$idM';";
$resultM = mysqli_query($link, $sqlM);
if($resultM)
    header("location: requestsAdmin.php");
else
    exit("something is wrong, this part didn't");

?>