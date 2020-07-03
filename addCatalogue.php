<?php 
include("connexion.php");
session_start();
if(!empty($_POST["catalogue"]))
    $name = $_POST["catalogue"];
else
    exit("field is empty !");
//Know what market are wee responsible of
$market = $_SESSION["market"];
//add to database
$sqlInsert = "INSERT INTO `goodiez`.`catalogue` (`id_catalogue`, `lib_catalogue`, `id_market`) VALUES (NULL, '$name', '$market');";
if(mysqli_query($link, $sqlInsert))
{
    header("location: gestionnaire.php");
    echo $market;
}
else
    exit("something's wrong");
?>