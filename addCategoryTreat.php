<?php 
include("connexion.php");
session_start();
if(!empty($_POST["catalogue"]))
    $Catalogue = $_POST["catalogue"];
else
    exit("Choose a catalogue !");
if(!empty($_POST["category"]))
    $nameCategory = $_POST["category"];
else
    exit("Category field is empty !");
//Know what market are wee responsible of
$market = $_SESSION["market"];
//add to database
$sqlInsert = "INSERT INTO `goodiez`.`rubrique` (`id_rubrique`, `lib_rubrique`, `id_catalogue`) VALUES (NULL, '$nameCategory', '$Catalogue');";
if(mysqli_query($link, $sqlInsert))
{
    header("location: addCategory.php");
    echo $market;
}
else
    exit("something's wrong");
?>