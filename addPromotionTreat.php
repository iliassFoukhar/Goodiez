<?php 
include("connexion.php");
session_start();
//is empty
if(!empty($_POST["catalogue"]))
    $catalogue = $_POST["catalogue"];
else
    exit("Choose a catalogue !");

if(!empty($_POST["percentage"]))
    $percentage = $_POST["percentage"];
else
    exit("Percentage field is empty !");

if(!empty($_POST["commentaire"]))
    $commentaire = $_POST["commentaire"];
else
    exit("Name field is empty !");
$addedBy = $_SESSION["id"];
$market = $_SESSION["market"];
//add to database
$sqlInsert = "INSERT INTO `goodiez`.`promotion` (`id_promo`, `pourcentage`, `commentaire`, `id_catalogue`, `added_by`) VALUES (NULL, '$percentage', '$commentaire', '$catalogue', '$addedBy');";
//edit the unit prices
$sqlLastPrice = "SELECT id_Product as id,unit_price as exPrice FROM product WHERE id_catalogue='$catalogue';";
$result1 = mysqli_query($link, $sqlLastPrice);
while($data1= mysqli_fetch_assoc($result1))
{
    $exPrice = $data1["exPrice"];
    $newPrice = $exPrice * $percentage;
    $productIdd = $data1["id"];
    $sqlPrices = "UPDATE product SET unit_price='$newPrice' WHERE id_Product = '$productIdd';";
    $resultNew = mysqli_query($link, $sqlPrices);
}
if(mysqli_query($link, $sqlInsert)&&$resultNew)
{
    header("location: addPromotion.php");
   
}
else
    exit("something's wrong");

?>