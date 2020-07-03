<?php 
include("connexion.php");
session_start();
$idUser = $_SESSION["id"];
//get ID commande
$sqlIdC = "SELECT Max(id_commande) AS m FROM commande;";
$resultC = mysqli_query($link, $sqlIdC);
$data = mysqli_fetch_assoc($resultC);
$idC = $data["m"] + 1;
//get values from cart
$sql = "SELECT * FROM `cart` WHERE id_user = '$idUser' ;";
$result = mysqli_query($link, $sql);
$data2 = mysqli_fetch_all($result);
$rowss = mysqli_num_rows($result);
for($i = 0; $i< $rowss; $i++)
{
    $idProduct = $data2[$i][1];
    $quantity = $data2[$i][2];
    $sqlInsert = "INSERT INTO `goodiez`.`commande` (`quantity`, `id_client`, `id_livreur`, `command_state`, `id_commande`, `id_produit`) VALUES ('$quantity', '$idUser', NULL, '0', '$idC', '$idProduct');";
    $resultInsert = mysqli_query($link,$sqlInsert);
    //minus stock
    $sqlStock = "SELECT stock AS s FROM Product WHERE id_Product = '$idProduct';";
    $resultStock = mysqli_query($link, $sqlStock);
    $dataStock = mysqli_fetch_assoc($resultStock);
    $stocky = $dataStock["s"] - $quantity;
    $sqlMinus = "UPDATE product SET stock = '$stocky' WHERE id_Product = '$idProduct';";
    $result = mysqli_query($link, $sqlMinus);
}
    header("location: emptyCart.php");
?>